<?php
  require 'header.php';
  if(isset($_SESSION['Email_id']))
  {
    header("location:index.php");
  }
?>
<?php
//require 'header.php';
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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

    </head>
    
    <body>

    
        <form action="check_login.php" method="POST">

            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6 col-md-8">
                                    <div class="tabulation animate-box">
                                        <center><h3 style='color: black;'>Login Here</h3></center>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                    <div class="col-xxs-12 col-xs-12 mt">
                                                        <div class="input-field">
                                                            <label for="from">E-mail:</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Enter E-mail">
                                                        </div>	
                                                        <div class="input-field">
                                                            <label for="from">Password:</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button style="background-color: orange;float:left" name="submit">Submit</button>
                                                                <a style="float: right" href="./forgotpassword/enteremail.php">forgot password?</a>
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
        
        <?php
        require 'footer.php';
        ?>
    </body>
</html>