<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SA Flight Ticket Reservation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="SA Flight Ticket Reservation" />
        <meta name="keywords" content="SA Flight Ticket Reservation" />     

        <!-- 
      
      
        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

        <!-- Animate.css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Superfish -->
        <link rel="stylesheet" href="css/superfish.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
        <!-- CS Select -->
        <link rel="stylesheet" href="css/cs-select.css">
        <link rel="stylesheet" href="css/cs-skin-border.css">

        <link rel="stylesheet" href="css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="fh5co-wrapper">
            <div id="fh5co-page">

                <header id="fh5co-header-section" class="sticky-banner">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                            <h1 id="fh5co-logo"><a href="index.php"><i class="icon-airplane"></i>SA Flight</a></h1>
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li><a href="index.php">Home</a></li>						
                                    <li><a href="contact.php">Contact</a></li>
                                    <?php
                                    if (isset($_SESSION['Email_id']) && isset($_SESSION['type'])) {
                                        echo '<li><a href="myflights.php">My Flights</a></li>';
                                        echo "<li>";
                                        echo '<a href="index.php" class="fh5co-sub-ddown">' . $_SESSION['Fname'] . $_SESSION['Lname'] . '</a>';
                                        echo '<ul class = "fh5co-sub-menu">';
                                        echo '<li><a href = "changepassword.php">Change Password</a></li>';
                                        echo '<li><a href = "logout.php">logout</a></li>';
                                        echo '</ul>
                                        </li>';
                                    } else {
                                        echo '<li><a href="Registration.php">Registration</a></li>
                                                            <li><a href="login.php">Login</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
                </body>
                </html>
