<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ob_start();
require 'header.php';
?>
<?php
if (isset($_SESSION['status'])) {
    ?>
    <div class="alert alert-info" role="alert">
        <?php
        echo $_SESSION['status'];
        ?>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>

<?php
require_once 'header.php';
$nop = @$_SESSION['number_of_passenger'];
$uid = @$_SESSION['uid'];
$date = @$_SESSION['date'];
date_default_timezone_set('Asia/Kolkata');
$realdate = date('Y-m-d H:i:s');
$_SESSION['realdate'] = $realdate;
?>
<html class="no-js">
    <head>

    </head>
    <style>
        body{
            background-color: whitesmoke !important;
        }
        form{
            margin-top: 5rem;
        }
        .card{
            border: 1px solid gray;
            padding: 10px;
            padding-bottom: 30px;
            border-radius: 10px;
        }
        .cs-select ul{
            max-height: 200px !important;
            overflow: scroll;
            overflow-x: hidden;
        }
    </style>
    <body>

        <form action="" method="POST"> 

            <div class="container">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="card shadow col-sm-0 w-40 mb-5 ">
                            <img class="card-img-top" src="..." alt="">
                            <div class="card-body">
                                <center><h3 class="card-title">Enter Passenger Details</h3></center>
                                <p class="card-text"></p>
                                <p class="card-text"><small class="text-muted"></small></p>
                                <?php
                                for ($i = 1; $i <= $nop; $i++) {
                                    echo '<div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                      <div class="col-xxs-4 col-xs-4 mt">
                                                        <div class="input-field">                                                            
                                                            <input type="text" class="form-control" name="pname' . $i . '" placeholder="Enter Passenger Name ' . $i . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-4 col-xs-4 mt">
                                                        
                                                        <select class="cs-select cs-skin-border" name="page' . $i . '">
                                                            <option value="" disabled selected>Select Age</option>';
                                                                for ($j = 1; $j <= 100; $j++) {
                                                                    echo "<option value=$j>$j</option>";
                                                                }
                                                                echo ' </select>
                                                    </div>
                                                    <div class="col-xxs-4 col-xs-4 mt">
                                                        
                                                        <select class="cs-select cs-skin-border" name="pgender' . $i . '">
                                                            <option value="" disabled selected>Select Gender </option>
                                                            <option value="male">Male</option><!-- comment -->
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>                                                    
                                                  
                                                </div>
                                            </div>


                                        </div>';
                                }
                                ?>

                                <input type="submit" name="submit" class="btn btn-primary btn-block btn-info btn-lg rounded-0" value="Continue">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <h1></h1>
            <?php
            require 'footer.php';
            ?>

    </body>
</html>
<?php
if (isset($_POST['submit'])) {

    require_once 'connection.php';

    for ($i = 1; $i <= $nop; $i++) {

        $name = $_POST["pname$i"];
        $age = $_POST["page$i"];
        $gender = $_POST["pgender$i"];
        echo "<script>alert('" . $name . "');</script>";
        $query = "insert into  ticket_detail values(null ,'$uid', null , '$name' , '$gender' , $age , '$date' , '$realdate')";

        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        header("location:payment_detail.php");
    }
}
ob_flush();
?>