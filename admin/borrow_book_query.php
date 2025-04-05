							<?php
								
								include ('include/dbcon.php');
								
								if (isset($_POST['return_now'])) {
									$user_id= $_POST['user_id'];
									$date_returned = $_POST['date_returned'];
									

									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['book_copies'];
									$new_book_copies = $book_copies + 1;
									
									mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ") or die (mysqli_error());
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("F j, Y, g:i a");
									$date_returned_now = date("F j, Y g:i a");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
								
									mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now' where user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned')") or die (mysqli_error());
							?>
									<script>
										window.location="borrow_book.php?school_number=<?php echo $school_number ?>";
									</script>
							<?php 
																}
							?>