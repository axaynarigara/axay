<?php
require_once 'header.php';
require 'connection.php';
$uid = $_SESSION['uid'];
$query = "select * from tblbook where uid='$uid'";
$result = mysqli_query($conn, $query);
//$fnumber = $result[3];
//echo "<script>alert('$fnumber')</script>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            td,th{
                padding: 10px;
                border: 4px solid blue;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container">
                    <div class="row">

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content mx-5">
                <div class="row mx-5">
                    <div class="col-md-11 mx-5">
                        <div class="card card-primary shadow">
                            <div class="card-header">
                                <center><h3 class="card-title">your Flight</h3></center>
                            </div>
                            <div class="card-body">
                                <center>
                                    <table>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Flight Date</th>
                                            <th>Flight number</th>
                                            <th>Class</th><!-- comment -->
                                            <th>Number of passenger</th>
                                            <th>Total Amounts</th>
                                            <th>Booking Status</th>
                                            <th>Action</th>
                                        </tr>


                                        <?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        $realdate = date('Y-m-d');
                                        while ($row = mysqli_fetch_row($result)) {
                                            echo "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>
                                            <td>$row[5]</td>
                                            <td>$row[6]</td>
                                            <td>$row[7]</td>";


                                            if ($row[8] == "false") {
                                                echo "<td>Cancel</td>";
                                            } else {
                                                echo "<td>Booked</td>";
                                            }
                                            if ($row[2] > $realdate) {
                                                if ($row[8] == "true") {
                                                    echo "<td style='color: red'>
                                                        <a onClick=\"javascript: return confirm('Do You Want TO cancel Flight');\" href='cancel_ticket.php?bid=$row[0] & fdate=$row[2] & total=$row[7] & class=$row[5] & nop=$row[6] & fnumber=$row[3]'><b>Cancel</b></a>               
                                                </td>";
                                                } else {
                                                    echo "<td>Cancel</td>";
                                                }
                                            } else {
                                                echo "<td>Can Not Cancel</td>";
                                            }
                                            echo "</tr>";
                                        }

                                        //<a class='btn btn-danger' href='cancel_ticket.php?bid=$row[0] & fdate=$row[2] & total=$row[7]'>Cancel</a>
                                        ?>
                                    </table>
                                </center>
                            </div>
                            </body>
                            </html>