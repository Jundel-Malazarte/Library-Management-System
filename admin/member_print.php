<?php
include('session.php');
include ('include/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print - Member List</title>
    <meta name="description" content="Member list printing for library management system">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* A4 paper settings */
        @page {
            size: A4;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 20mm;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 210mm; /* A4 width */
            min-height: 297mm; /* A4 height */
            margin: 0 auto;
            background: white;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            padding-top: 20px;
        }

        .logo-left {
            position: absolute;
            left: 20px;
            top: 20px;
            width: 80px;
            height: 80px;
        }

        .logo-right {
            position: absolute;
            right: 20px;
            top: 20px;
            width: 80px;
            height: 80px;
        }

        .title {
            margin: 0;
            padding: 10px 0;
            font-size: 16pt;
            color: #333;
        }

        .subtitle {
            margin: 5px 0;
            font-size: 14pt;
            color: #666;
        }

        .date-prepared {
            text-align: right;
            margin: 20px 0;
            color: #444;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 11pt;
        }

        .table th {
            background-color: #f5f5f5;
            padding: 12px 8px;
            border: 1px solid #ddd;
            font-weight: bold;
        }

        .table td {
            padding: 10px 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .prepared-by {
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            font-size: 12pt;
        }

        /* Print-specific styles */
        @media print {
            #print {
                display: none;
            }
            
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .table th {
                background-color: #f5f5f5 !important;
            }
        }

        #print {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
            font-size: 14px;
        }

        #print:hover {
            background-color: #0056b3;
        }

        .page-title {
            font-size: 16pt;
            font-weight: bold;
            margin: 20px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <button type="button" id="print" onclick="printPage()">Print Member List</button>
    
    <div class="container">
        <div class="header">
            <img src="images/logo.jpeg" class="logo-left" alt="Left Logo">
            <img src="images/logo4.jpg" class="logo-right" alt="Right Logo">
            <h1 class="title">Republic of the Philippines</h1>
            <h2 class="subtitle">Library Management System</h2>
            <h3 class="subtitle">College of Nursing</h3>
        </div>

        <div class="page-title">Member List</div>

        <div class="date-prepared">
            <strong>Date Prepared:</strong> <?php include('currentdate.php'); ?>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Level</th>
                    <th>Section</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($con, "SELECT * FROM user ORDER BY user_id DESC") or die(mysqli_error());
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['firstname']." ".$row['middlename']." ".$row['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['type']); ?></td>
                    <td><?php echo htmlspecialchars($row['level']); ?></td>
                    <td><?php echo htmlspecialchars($row['section']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>

        <div class="prepared-by">
            <?php
            $user_query = mysqli_query($con, "SELECT * FROM admin WHERE admin_id='$id_session'") or die(mysqli_error());
            if ($row = mysqli_fetch_array($user_query)) {
                echo "<strong>Prepared by:</strong><br>";
                echo htmlspecialchars($row['firstname']." ".$row['lastname']);
            }
            ?>
        </div>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>