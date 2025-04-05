<?php 

include('include/dbcon.php');

$get_id=$_GET['return_temporary_id'];

mysqli_query($con,"delete from return_temporary where return_temporary_id = '$get_id' ")or die(mysqli_error()); {

?>


							<?php
								if (isset($_POST['return_now'])) {
									$user_id= $_POST['user_id'];
									$borrow_book_id= $_POST['borrow_book_id'];
									$book_id= $_POST['book_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned = $_POST['date_returned'];

									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['book_copies'];
									$new_book_copies = $book_copies + 1;
								
									mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id'") or die (mysqli_error());
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("Y-m-d H:i:s");
									$date_returned_now = date("Y-m-d H:i:s");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
									
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
									
									$id=$_GET['return_temporary_id'];
									
									mysqli_query($con,"delete from return_temporary where return_temporary_id = '$id' ")or die(mysqli_error());
								
									mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());
							?>
									<script>
										window.location="borrow_book.php?school_number=<?php echo $school_number ?>";
									</script>
							<?php 
} }
							?>