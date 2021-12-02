<?php
//session_start();
require 'header.php';
if (isset($_SESSION['status'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php
        echo $_SESSION['status'];
        ?>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html class="no-js">
    <body>
        <?php
        if (isset($_SESSION['fnamereg'])) {
            $fname = @$_SESSION['fnamereg'];
            $lname = @$_SESSION['lnamereg'];
            $email = @$_SESSION['emailreg'];
            $mobil = @$_SESSION['mobilreg'];
            echo '<form action="check_registration.php" method="POST">
            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="tabulation animate-box">
                                        <center><h3 style="color: black;">Registration here</h3></center>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">First name:</label>
                                                            <input type="text" class="form-control"  name="firstname" placeholder="Enter First" value="' . $fname . '" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Last name:</label>
                                                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last" value="' . $lname . '" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">E-mail:</label>
                                                            <input type="email" class="form-control" name="emailid" placeholder="Enter E-mail" value="' . $email . '" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="date-start">Mobile Number:</label>
                                                            <input type="number" class="form-control" name="mobilenumber" placeholder="Mobile Number" value="' . $mobil  . '" required>
                                                        </div>
                                                    </div><!-- comment -->
                                                    
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Password:</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Re-Password:</label>
                                                            <input type="password" class="form-control" name="repassword" placeholder="Re-Enter password" required>
                                                            <small id="emailHelp" class="form-text text-muted"><b>*Make sure to type same Password</b></small>> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <center>
                                                            <button style="background-color: orange" name="submit">Submit</button>
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
        </form>';
        } else {
            echo '<form action="check_registration.php" method="POST">
            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="tabulation animate-box">
                                        <center><h3 style="color: black;">Registration here</h3></center>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">First name:</label>
                                                            <input type="text" class="form-control"  name="firstname" placeholder="Enter First"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Last name:</label>
                                                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">E-mail:</label>
                                                            <input type="email" class="form-control" name="emailid" placeholder="Enter E-mail" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="date-start">Mobile Number:</label>
                                                            <input type="number" class="form-control" name="mobilenumber" placeholder="Mobile Number"  required>
                                                        </div>
                                                    </div><!-- comment -->
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Password:</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">Re-Password:</label>
                                                            <input type="password" class="form-control" name="repassword" placeholder="Re-Enter password" required>
                                                            <small id="emailHelp" class="form-text text-muted"><b>*Make sure to type same Password</b></small>> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <center>
                                                            <button style="background-color: orange" name="submit">Submit</button>
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
        </form>';
        }
        ?>
        <?php
        require 'footer.php';
        ?>

    </body>
</html>