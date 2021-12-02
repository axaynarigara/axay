<?php
ob_start();
require 'header.php';

if (isset($_REQUEST['FID']))
    $FID = $_REQUEST['FID'];
$_SESSION['flight_number'] = @$_REQUEST['FID'];
$_SESSION['Price'] = @$_REQUEST['Price'];
?>
<?php
if (isset($_SESSION['status'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['status']; ?>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>
<?php
if (!isset($_SESSION['Email_id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html class="no-js">
    <head>

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
                                                    <div class="col-xx
                                                         s-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Date:</label>
                                                            <input type="Date" class="form-control" name="date" placeholder="Enter date" required>
                                                        </div>	

                                                        <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button style="background-color: orange;" name="submit">Continue</button>
                                                            </center>
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
                </div>
        </form>

    </body>
</html>
<?php
require 'footer.php';
?>
<?php
if (isset($_POST['submit'])) {
    
    require 'connection.php';
    $date = $_POST['date'];
    $_SESSION['date'] = $_POST['date'];
    $query = "select * from checkavalibility  where date = '$date' and flight_number='$FID'";
    
    $result = mysqli_query($conn, $query);
    $dateexis = mysqli_num_rows($result);
    echo "<script>alert('$query')</script>";
    if ($dateexis > 0) {
        $class = $_SESSION['class'];
        $q = "select * from checkavalibility where date='$date' and flight_number='$FID'";
        $r = mysqli_query($conn, $q);
        $row = mysqli_fetch_array($r);
        //echo "<script> alert('" . $class . "')</script>";
        if ($class == "Economy") {
            $availableseat = $row['economy_capacity'];
            $_SESSION['status'] = "available seat is $availableseat";
        } elseif ($class == "First") {
            $availableseat = $row['firstclass_capacity'];
            $_SESSION['status'] = "available seat is $availableseat";
        } elseif ($class == "Business") {
            $availableseat = $row['businessclass_capacity'];
            $_SESSION['status'] = "available seat is $availableseat";
        }

        if ($availableseat == 0) {
            $_SESSION['status'] = "seat is not available in $date";
            header("location:Book_ticket.php");
        } else {
            echo "<script> alert('" . $availableseat . "')</script>";
            header("location:seatselect.php");
        }
    } else {
        $query1 = "insert into checkavalibility values(null , '$FID' , 70 , 20 , 10 , '$date')";
        mysqli_query($conn, $query1);
        $class = $_SESSION['class'];

        if ($class == "Economy") {
            $_SESSION['status'] = "available seat is 70";
        } elseif ($class == "First") {
            $_SESSION['status'] = "available seat is 20";
        } elseif ($class == "Business") {
            $_SESSION['status'] = "available seat is 10";
        }

        header("location:seatselect.php");
    }
}
ob_flush();
?>