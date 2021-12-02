<?php

session_start();
require 'connection.php';

if (isset($_POST['submit'])) {
    unset($_SESSION['emailreg']);
    unset($_SESSION['mobilreg']);
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['emailid'];
    $mobilnumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $_SESSION['opassword'] = $_POST['password'];
    $_SESSION['ofname'] = $_POST['firstname'];
    $_SESSION['olname'] = $_POST['lastname'];
    $_SESSION['oemail'] = $_POST['emailid'];
    $_SESSION['omobil'] = $_POST['mobilenumber'];

    $existemail = "select * from tblregistration  where Email_id = '$email'";
    $emailresult = mysqli_query($conn, $existemail);
    $emailexistrow = mysqli_num_rows($emailresult);
    $validationmobil = "/^[6-9][0-9]{9}$/";
    if ($emailexistrow > 0) {
        $_SESSION['fnamereg'] = $_POST['firstname'];
        $_SESSION['lnamereg'] = $_POST['lastname'];        
        $_SESSION['mobilreg'] = $_POST['mobilenumber'];
        $_SESSION['status'] = "Email id is already exist";
        header("location:Registration.php");
    } else {
        if (($password == $repassword)) {
            if (preg_match($validationmobil, $mobilnumber)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    require 'connection.php';
                    require './PHPMailer/sendOTP.php';
                    $_SESSION['OTP'] = rand(1000, 9999);
                    $_SESSION['email'] = $email;
                    $_SESSION['Mail_Status'] = sendOTP($email, $_SESSION['OTP']);
                    if ($_SESSION['Mail_Status']) {
                        header("location:reg_check_otp.php");
                    } else {
                        echo "<script> alert('OTP Not sent');</script>";
                    }
                } else {
                    $_SESSION['fnamereg'] = $_POST['firstname'];
                    $_SESSION['lnamereg'] = $_POST['lastname'];                    
                    $_SESSION['mobilreg'] = $_POST['mobilenumber'];
                    $_SESSION['status'] = "Invalid E-mail";
                    header("location:Registration.php");
                }
            } else {
                $_SESSION['fnamereg'] = $_POST['firstname'];
                $_SESSION['lnamereg'] = $_POST['lastname'];
                $_SESSION['emailreg'] = $_POST['emailid'];                
                $_SESSION['status'] = "Invalid Mobile number";
                header("location:Registration.php");
            }
        } else {
            $_SESSION['fnamereg'] = $_POST['firstname'];
            $_SESSION['lnamereg'] = $_POST['lastname'];
            $_SESSION['emailreg'] = $_POST['emailid'];
            $_SESSION['mobilreg'] = $_POST['mobilenumber'];
            $_SESSION['status'] = "Password do not match";
            header("location:Registration.php");
        }
    }
}