<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'header.php';
?>
<?php
require 'connection.php';
require './PHPMailer/sendOTP.php';


$email = $_SESSION['Email_id'];
$fname = $_SESSION['Fname'];
$lname = $_SESSION['Lname'];
$date = $_SESSION['date'];
$from = $_SESSION['departure'];
$destination = $_SESSION['arrival'];
$nop = $_SESSION['number_of_passenger'];
$uid = $_SESSION['uid'];
$datetime = $_SESSION['realdate'];
$_SESSION['Mail_Status'] = sendticket($email, $fname, $lname, $date, $from, $destination, $nop);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style type="text/css">

            body
            {
                background:#f2f2f2;
            }

            .payment
            {
                border:1px solid #f2f2f2;
                height:280px;
                border-radius:20px;
                background:#fff;
            }
            .payment_header
            {
                background:rgba(255,102,0,1);
                padding:20px;
                border-radius:20px 20px 0px 0px;

            }

            .check
            {
                margin:0px auto;
                width:50px;
                height:50px;
                border-radius:100%;
                background:#fff;
                text-align:center;
            }

            .check i
            {
                vertical-align:middle;
                line-height:50px;
                font-size:30px;
            }

            .content 
            {
                text-align:center;
            }

            .content  h1
            {
                font-size:25px;
                padding-top:25px;
            }

            .content a
            {
                width:200px;
                height:35px;
                color:#fff;
                border-radius:30px;
                padding:5px 10px;
                background:rgba(255,102,0,1);
                transition:all ease-in-out 0.3s;
            }

            .content a:hover
            {
                text-decoration:none;
                background:#000;
            }

        </style>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="payment">
                        <div class="payment_header">
                            <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                        <div class="content">
                            <?php
                            if ($_SESSION['Mail_Status']) {
                                echo '<h1>Payment Success !</h1>
                            <p>Congratulations Your ticket has been booked Successfully..For More detail check your E-Mail!</p>                            
                            <h3><a href="index.php">Go to Home</a></h3>';
                            } else {
                                echo '<h1>Payment Error !</h1>
                            <p>Sorry there some error please try again!</p>                            
                            <h3><a href="index.php">Go to Home</a></h3>';

                            $passengerdeletequery = "delete from ticket_detail where uid='$uid' and booking_realdate='$datetime'";
                            mysqli_query($conn, $passengerdeletequery);
                            $bookdelete = "delete from tblbook where uid='$uid' and booking_realdate='$datetime'";
                            mysqli_query($conn, $bookdelete);
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
