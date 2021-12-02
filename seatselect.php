<?php
require './header.php';
require 'connection.php';
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
$class = $_SESSION['class']; //view_flight.php
$date = @$_SESSION['date'];
$numberofpassenger = $_SESSION['number_of_passenger'];
//echo "<script>alert('$class')</script>";

$q = "select * from ticket_detail where date='$date'";
$result = mysqli_query($conn, $q);
echo "<script>alert('$q')</script>";
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>CodePen - CSS seat booking</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="./style.css">

    </head>
    <style>
        .seat:nth-child(3) {
            margin-right: 14.2857142857%;
        }
        .seat:nth-child(7) {
            margin-right: 14.2857142857%;
        }
        .plane{
            margin-left: 500px;
        }
    </style>
    <body>
        <h1 class="text-center"><b>Please select your seat</b></h1>
        <hr>
        <!-- partial:index.partial.html -->
        <div class="plane">
            <!--div class="cockpit">
                <h1>Please select a seat</h1>
            </div-->
            <div class="/*exit exit--front fuselage*/">

            </div>
            <ol class="cabin /*fuselage*/">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $SeatArray[] = $row['seat_number'];
                    }
                } else {
                    $SeatArray = array();
                }

                sort($SeatArray);
                $sc = 0;

                $count = 1;
                $seatnumber = $row['seat_number'];
                echo "<script>alert('$seatnumber')</script>";
                for ($i = 1; $i < 11; $i++) {
                    echo '<li class="row row--' . $i . '">
                        <ol class="seats" type="' . $i . '">';
                    for ($j = 1; $j < 11; $j++) {
                        if ($class == "Economy") {
                            if ($count <= 30 || $count == $SeatArray[$sc]) {
                                echo '
                                    <li class="seat">
                                        <input type="checkbox" id="' . $count . '" disabled />
                                        <label for="' . $count . '">' . $count . '</label>
                                    </li>';

                                if ($sc != count($SeatArray) - 1)
                                    $sc += 1;
                            } else {
                                echo '
                                    <li class="seat">
                                        <input class="newseat" type="checkbox" id="' . $count . '" />
                                        <label for="' . $count . '">' . $count . '</label>
                                    </li>';
                            }
                        }

                        if ($class == "Business") {
                            if ($count > 10) {
                                echo '
                            <li class="seat">
                                <input type="checkbox" id="' . $count . '" disabled />
                                <label for="' . $count . '">' . $count . '</label>
                            </li>';
                            } else {
                                echo '
                            <li class="seat">
                                <input type="checkbox" id="' . $count . '" />
                                <label for="' . $count . '">' . $count . '</label>
                            </li>';
                            }
                        }

                        if ($class == "First") {
                            if ($count <= 10 || $count > 30) {
                                echo '
                            <li class="seat">
                                <input type="checkbox" id="' . $count . '" disabled />
                                <label for="' . $count . '">' . $count . '</label>
                            </li>';
                            } else {
                                echo '
                            <li class="seat">
                                <input type="checkbox" id="' . $count . '" />
                                <label for="' . $count . '">' . $count . '</label>
                            </li>';
                            }
                        }

                        $count++;
                    }
                    echo ' </ol>
                </li>';
                }


//               $count = 1;
//                
//                            
//                for ($i = 1; $i < 11; $i++) {
//                     echo '<li class="row row--'.$i.'">
//                        <ol class="seats" type="'.$i.'">';
//                    for ($j = 1; $j < 11; $j++)
//                    {                        
//                        if($class == "Economy")
//                        {
//                            if($count <= 30)
//                            {
//                                 echo '
//                            <li class="seat">
//                                <input type="checkbox" id="'.$count.'" disabled />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';  
//                            }
//                            else
//                            {
//                                echo '
//                            <li class="seat">
//                                <input class="newseat" type="checkbox" id="'.$count.'" />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';
//                            }
//                               
//                        }
//                        
//                        if($class == "Business")
//                        {
//                            if($count > 10)
//                            {
//                                 echo '
//                            <li class="seat">
//                                <input type="checkbox" id="'.$count.'" disabled />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';  
//                            }
//                            else
//                            {
//                                echo '
//                            <li class="seat">
//                                <input type="checkbox" id="'.$count.'" />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';
//                            }
//                               
//                        }
//                         
//                        if($class == "First")
//                        {
//                            if($count <= 10 || $count >30)
//                            {
//                                 echo '
//                            <li class="seat">
//                                <input type="checkbox" id="'.$count.'" disabled />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';  
//                            }
//                            else
//                            {
//                                echo '
//                            <li class="seat">
//                                <input type="checkbox" id="'.$count.'" />
//                                <label for="'.$count.'">'.$count.'</label>
//                            </li>';
//                            }
//                               
//                        }
//                        
//                        $count++;
//                    }
//                    echo ' </ol>
//                </li>';
//                }
                ?>
                <!--comment
                <li class="row row--1">
                    <ol class="seats" type="A">

                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="1A">1A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1B" />
                            <label for="1B">1B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1C" />
                            <label for="1C">1C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" disabled id="1D" />
                            <label for="1D">Occupied</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1E" />
                            <label for="1E">1E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1F" />
                            <label for="1F">1F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="1G">1G</label>
                        </li>

                    </ol>
                </li>
                <li class="row row--2">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="2A" />
                            <label for="2A">2A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="2B" />
                            <label for="2B">2B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="2C" />
                            <label for="2C">2C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="2D" />
                            <label for="2D">2D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="2E" />
                            <label for="2E">2E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="2F" />
                            <label for="2F">2F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="2G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--3">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="3A" />
                            <label for="3A">3A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="3B" />
                            <label for="3B">3B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="3C" />
                            <label for="3C">3C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="3D" />
                            <label for="3D">3D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="3E" />
                            <label for="3E">3E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="3F" />
                            <label for="3F">3F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="3G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--4">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="4A" />
                            <label for="4A">4A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="4B" />
                            <label for="4B">4B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="4C" />
                            <label for="4C">4C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="4D" />
                            <label for="4D">4D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="4E" />
                            <label for="4E">4E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="4F" />
                            <label for="4F">4F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="4G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--5">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="5A" />
                            <label for="5A">5A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="5B" />
                            <label for="5B">5B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="5C" />
                            <label for="5C">5C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="5D" />
                            <label for="5D">5D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="5E" />
                            <label for="5E">5E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="5F" />
                            <label for="5F">5F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="5G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--6">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="6A" />
                            <label for="6A">6A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="6B" />
                            <label for="6B">6B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="6C" />
                            <label for="6C">6C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="6D" />
                            <label for="6D">6D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="6E" />
                            <label for="6E">6E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="6F" />
                            <label for="6F">6F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="6G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--7">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="7A" />
                            <label for="7A">7A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="7B" />
                            <label for="7B">7B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="7C" />
                            <label for="7C">7C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="7D" />
                            <label for="7D">7D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="7E" />
                            <label for="7E">7E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="7F" />
                            <label for="7F">7F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="7G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--8">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="8A" />
                            <label for="8A">8A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="8B" />
                            <label for="8B">8B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="8C" />
                            <label for="8C">8C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="8D" />
                            <label for="8D">8D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="8E" />
                            <label for="8E">8E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="8F" />
                            <label for="8F">8F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="8G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--9">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="9A" />
                            <label for="9A">9A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="9B" />
                            <label for="9B">9B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="9C" />
                            <label for="9C">9C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="9D" />
                            <label for="9D">9D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="9E" />
                            <label for="9E">9E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="9F" />
                            <label for="9F">9F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="9G">1G</label>
                        </li>
                    </ol>
                </li>
                <li class="row row--10">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="10A" />
                            <label for="10A">10A</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="10B" />
                            <label for="10B">10B</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="10C" />
                            <label for="10C">10C</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="10D" />
                            <label for="10D">10D</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="10E" />
                            <label for="10E">10E</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="10F" />
                            <label for="10F">10F</label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="1A" />
                            <label for="10G">1G</label>
                        </li>
                    </ol>
                </li>
            </ol-->

                <div class="/*exit exit--back fuselage*/ ">

                </div>
        </div>
        <script>
            let count = 0;
            $(document).ready(function () {

                $(".newseat").click(function () {
                    count += 1;
                    alert(count);
                })

            })
        </script>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    </body>
</html>
<?php
//require './footer.php';
?>
