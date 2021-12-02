<?php

session_start();
$showError = false;
require 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //$query = "select * from tblregistration where `Email_id`='$email' AND `Password`='$password'";
    $query = "select * from tblregistration where Email_id='$email'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row1 = mysqli_fetch_assoc($result)) {
            if (password_verify($password,$row1['Password'])) 
            {          
                    
                    $_SESSION['loggedin'] = true;
                    $_SESSION['Email_id'] = $email;
                    $_SESSION['uid'] = $row1['Uid'];
                    $_SESSION['Fname'] = $row1['First_Name'];
                    $_SESSION['Lname'] = $row1['Last_Name'];
                    if ($row1['type'] == "admin") {
                        header("location: ./admin/home.php");
                    } 
                    elseif ($row1['type'] == "customer") {
                        $_SESSION['type'] = $row1['type'];
                        header("location: index.php");
                    }    
            } else {
                $_SESSION['status'] = "Invalid E-mail or Password";
                header("location:login.php");
            }
        }
    } else {
        $_SESSION['status'] = "Invalid E-mail or Password";
       header("location:login.php");
    }
}
?>