 <?php
        require_once 'header.php';
        //echo $_SESSION['Fname'];
?>
<html class="no-js">
    <head>

    </head>
    <style>
        .cs-select ul{
            max-height: 200px !important;
            overflow: scroll;
            overflow-x: hidden;
        }
    </style>
    <body>
        <!-- end:header-top -->
        <form action="view_flight.php" method="POST">                
            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                    <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="tabulation animate-box">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#Oneway" aria-controls="Oneway" role="tab" data-toggle="tab">One way</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="Oneway">
                                                <div class="row">
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">From:</label>
                                                            <input type="text" list="my-list" class="cs-select cs-skin-border form-control" name="from" required>
                                                            <datalist id="my-list">
                                                                <?php
                                                                require 'connection.php';
                                                                $record = mysqli_query($conn, "select city from list_of_city");

                                                                while ($data = mysqli_fetch_array($record)) {
                                                                    echo "<option value='" . $data['city'] . "'>" . $data['city'] . "</option>";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <div class="input-field">
                                                            <label for="from">To:</label>
                                                            <input type="text" list="my-list" class="cs-select cs-skin-border form-control" name="to" required>
                                                            <datalist id="my-list">
                                                                <?php
                                                                require 'connection.php';
                                                                $record = mysqli_query($conn, "select city from list_of_city");

                                                                while ($data = mysqli_fetch_array($record)) {
                                                                    echo "<option value='" . $data['city'] . "'>" . $data['city'] . "</option>";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <section class="input-field">
                                                            <label for="class">Class:</label>
                                                            <br>
                                                            <select class="cs-select cs-skin-border" name="class" required>
                                                                <option value="" disabled selected>Select</option>
                                                                <option value="Economy">Economy</option>
                                                                <option value="First">First</option>
                                                                <option value="Business">Business</option>
                                                            </select>
                                                        </section>
                                                    </div>
                                                    <div class="col-xxs-12 col-xs-6 mt">
                                                        <section>
                                                            <label for="class">Number of passenger:</label>
                                                            <select class="cs-select cs-skin-border" name="number_of_passenger" required>
                                                                <option value="" disabled selected>Select</option>

                                                                <?php
                                                                for ($i = 1; $i <= 50; $i++) {
                                                                    echo "<option value=$i>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </section>
                                                    </div>
                                                   
                                                    <div class="col-xs-12">
                                                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-info btn-lg rounded-0" value="Search Flight">
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

            <div id="fh5co-tours" class="fh5co-section-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                            <h3>Trending Searches</h3>
                            <p>Far far away, in the India's Jammu Kashmir to Kanyakumari</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                            <div href="#"><img src="images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                                <div class="desc">
                                    <span></span>
                                    <h3>Delhi -> Kolkata</h3>
                                    <span class="price">INR: 5,000</span>
                                    <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                            <div href="#"><img src="images/place-2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                                <div class="desc">
                                    <span></span>
                                    <h3>Delhi -> Mumbai</h3>
                                    <span class="price">INR: 5,000</span>
                                    <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                            <div href="#"><img src="images/place-3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                                <div class="desc">
                                    <span></span>
                                    <h3>Delhi -> Goa</h3>
                                    <span class="price">INR: 5,000</span>
                                    <a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center animate-box">
                            <p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Offers <i class="icon-arrow-right22"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 animate-box">

                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-hotairballoon"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Family Travel</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 animate-box">
                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-search"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Travel Plans</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 animate-box">
                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-wallet"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Honeymoon</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 animate-box">

                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-wine"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Business Travel</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 animate-box">
                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-genius"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Solo Travel</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 animate-box">
                            <div class="feature-left">
                                <span class="icon">
                                    <i class="icon-chat"></i>
                                </span>
                                <div class="feature-copy">
                                    <h3>Explorer</h3>
                                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
                                    <p><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-destination">
                <div class="tour-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="fh5co-destination-list" class="animate-box">
                                <li class="one-forth text-center" style="background-image: url(images/place-1.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Agra</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-2.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Goa</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-3.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>New Delhi</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-4.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Bengaluru</h2>
                                        </div>
                                    </a>
                                </li>

                                <li class="one-forth text-center" style="background-image: url(images/place-5.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Jaipur</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-half text-center">
                                    <div class="title-bg">
                                        <div class="case-studies-summary">
                                            <h2>Most Popular Destinations</h2>
                                        </div>
                                    </div>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-6.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Mumbai</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-7.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Kolkata</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-8.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Chennai</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-9.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Hyderabad</h2>
                                        </div>
                                    </a>
                                </li>
                                <li class="one-forth text-center" style="background-image: url(images/place-10.jpg); ">
                                    <a href="#">
                                        <div class="case-studies-summary">
                                            <h2>Ahmedabad</h2>
                                        </div>
                                    </a>
                                </li>
                            </ul>		
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