<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ob_start();
require_once 'header.php';
$flightnumber = @$_SESSION['flight_number'];
$price = @$_SESSION['Price'];
$nop = @$_SESSION['number_of_passenger'];
$date = @$_SESSION['date'];
$total = $price * $nop;
$_SESSION['total'] = $total;
//echo "<script>alert('$price + $flightnumber')</script>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <form action="" method="POST">

            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="tabulation animate-box">
                                        <center><h3</h3></center>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead style="color: black;">
                                                                <tr>
                                                                    <th>Flight Number</th>
                                                                    <th>Flight Date</th>
                                                                    <th>Total</th>                                     
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a class="navi-link" href="#order-details" data-toggle="modal"><?php echo $flightnumber; ?></a></td>
                                                                    <td style="color: black";><?php echo $date;?></td>                                                                    
                                                                    <td><span style="color: black;"> <?php echo $total; ?> </span></td>
                                                                    <!--<td><button style="background: orange;"name="submit" >Book Now</button></td>-->
                                                                </tr>                                                            
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-info btn-lg rounded-0" value="Book Now">
                                                    </div>                                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>						
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

    </body>
</html>
<?php
require_once 'footer.php';
?>
<?php
if(isset($_POST['submit']))
{
    
    header("location:payment.php");
}
ob_flush();
?>