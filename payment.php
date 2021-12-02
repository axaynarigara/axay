<!doctype html>
<?php
ob_start();
require_once 'header.php';
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Payment</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>.inlineimage {
                max-width: 470px;
                margin-right: 8px;
                margin-left: 10px
            }

            .images {
                display: inline-block;
                max-width: 98%;
                height: auto;
                width: 22%;
                margin: 1%;
                left: 20px;
                text-align: center
            }</style>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
        <form method="post">
            <div class="container">
                <div class="page-header text-center">
                    <h1>Payment </h1>
                </div>
                <!-- Credit Card Payment Form - START -->
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <h3 class="text-center">Payment Details</h3>
                                        <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group"> <label>CARD NUMBER</label>
                                                    <div class="input-group"> <input type="number" name="cardnumber" class="form-control" placeholder="Valid Card Number" required /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7 col-md-7">
                                                <div class="form-group"> <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label> <input type="tel" class="form-control" placeholder="MM / YY" required/> </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5 pull-right">
                                                <div class="form-group"> <label>CV CODE</label> <input type="tel"  name="cv" class="form-control" placeholder="CVC" required/> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name" required/> </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-xs-12"> <button class="btn btn-success btn-lg btn-block" name="submit">Confirm Payment</button> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
        <script type='text/javascript'></script>
    </body>
</html>
<?php
require_once 'connection.php';
$cardnumber = @$_POST['cardnumber'];
$cv = @$_POST['cv'];
$cardnumberlen = strlen(strval($cardnumber));
$cvlen = strlen(strval($cv));

date_default_timezone_set('Asia/Kolkata');
$realdate = date('Y-m-d H:i:s');
$datetime = $_SESSION['realdate']; //passenger_detail.php
$_SESSION['realdate'] = $datetime;
$flightdate = $_SESSION['date']; //Book_ticket.php
$flightnumber = $_SESSION['flight_number']; //Book_ticket.php
$uid = $_SESSION['uid']; //check_login.php
$class = $_SESSION['class']; //view_flight.php
$numberofpassenger = $_SESSION['number_of_passenger']; //view_flight.php
$total = $_SESSION['total']; // payment_detail.php
$booking_status = "true";
$payment_method = "creadit-card";
$refund = "NON";
//echo "<script>alert('$flightnumber  ')</script>";
if (isset($_POST['submit'])) {


    if ($cardnumberlen == 16) {
        if ($cvlen == 3) {
            
            $query = "insert into tblbook values(null, '$realdate' , '$flightdate' , '$flightnumber' , '$uid' , '$class' , '$numberofpassenger' , '$total' , '$booking_status' , '$payment_method' , '$refund')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $query1 = "select bid from tblbook where time_date='$realdate' and Flight_Date='$flightdate' and uid='$uid'";
                $result1 = mysqli_query($conn, $query1);
                $bid = mysqli_fetch_array($result1)[0];

                $query2 = "update ticket_detail set booking_id='$bid' where uid='$uid' and booking_realdate='$datetime'";
                $result2 = mysqli_query($conn, $query2);

                if ($class == "Economy") {
                    $availiblityupdate = "update checkavalibility set economy_capacity= economy_capacity-$numberofpassenger where flight_number='$flightnumber' and date='$flightdate'";
                } elseif ($class == "First") {
                    $availiblityupdate = "update checkavalibility set firstclass_capacity= firstclass_capacity-$numberofpassenger where flight_number='$flightnumber' and date='$flightdate'";
                } elseif ($class == "Business") {
                    $availiblityupdate = "update checkavalibility set businessclass_capacity= businessclass_capacity-$numberofpassenger where flight_number='$flightnumber' and date='$flightdate'";
                }
                mysqli_query($conn, $availiblityupdate);
                header("location:payment_success.php");
            }
        }
    }
 else {
        echo "<script>alert('try again..!')</script>";
    }
} else {
    $passengerdeletequery = "delete from ticket_detail where uid='$uid' and time_date='$datetime'";
    mysqli_query($conn, $passengerdeletequery);
    
}
ob_flush();
?>