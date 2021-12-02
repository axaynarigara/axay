<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $bid = $_REQUEST['bid'];
        $date = $_REQUEST['fdate'];
        $class = $_REQUEST['class'];
        $totalamount = $_REQUEST['total'];
        $nop = $_REQUEST['nop'];
        $fnumber = $_REQUEST['fnumber'];
        require 'connection.php';
        $query = "update tblbook set booking_status = 'false' , refund_amount='$totalamount' where bid='$bid'";
        mysqli_query($conn, $query);
        $deletecustomerdetail = "delete from ticket_detail where booking_id='$bid' and date='$date'";
        mysqli_query($conn, $deletecustomerdetail);
        
        if ($class == "Economy ") {
           // echo "<script>alert('$class')</script>";
            $plusavalibility = "update checkavalibility set economy_capacity=economy_capacity+'$nop' WHERE flight_number='$fnumber' and date='$date'";
            mysqli_query($conn, $plusavalibility);
        } elseif ($class == "First") {
            $plusavalibility = "update checkavalibility set firstclass_capacity=economy_capacity+'$nop' WHERE flight_number='$fnumber' and date='$date'";
            mysqli_query($conn, $plusavalibility);
        } elseif ($class == "Business") {
            $plusavalibility = "update checkavalibility set businessclass_capacity=economy_capacity+'$nop' WHERE flight_number='$fnumber' and date='$date'";
            mysqli_query($conn, $plusavalibility);
        }
        
        header("location:myflights.php");
        ?>
    </body>
</html>
