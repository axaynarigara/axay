
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <!-- end:header-top -->



        <div id="fh5co-contact" class="fh5co-section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                        <h3>Contact Information</h3>
                        <p>Far far away, in the India's Jammu Kashmir to Kanyakumari</p>
                    </div>
                </div>
                <form action="#" method="post">
                    <div class="row animate-box">
                        <div class="col-md-6">
                            <h3 class="section-title">Our Address</h3>
                            <p>Far far away, in the India's Jammu Kashmir to Kanyakumari</p>
                            <ul class="contact-info">
                                <li><i class="icon-location-pin"></i>198 West 21th Street, Surat</li>
                                <li><i class="icon-phone2"></i>+ 98245 25077</li>
                                <li><i class="icon-phone2"></i>+ 99987 52793</li>
                                <li><i class="icon-mail"></i><a href="#">saflight@.gmail.com.in</a></li>
                                <li><i class="icon-globe2"></i><a href="#">www.saflight.com</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name"  name="name"required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button name="submit" class="btn btn-primary">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            require 'connection.php';
            $query = "insert into tblcontactus values (null , '$name' , '$email' , '$message')";
            $r = mysqli_query($conn, $query);
        }
        ?>
        <?php
        require 'footer.php';
        ?>
    </body>
</html>

