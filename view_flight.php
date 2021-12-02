<?php
require_once 'header.php';
require 'connection.php';
if (isset($_POST['submit'])) {
    
    $from = @$_POST['from'];
    $to = @$_POST['to'];
    $class = @$_POST['class'];
    $_SESSION['departure'] = @$_POST['from'];
    $_SESSION['arrival'] = @$_POST['to'];
    $_SESSION['class'] = @$_POST['class'];
    $_SESSION['number_of_passenger'] = @$_POST['number_of_passenger'];
    $query = "select * from tblflight inner join tblclass on tblclass.flight_number = tblflight.Flight_Number where Departure='$from' and arrival='$to' and class_name = '$class'";
    $result = mysqli_query($conn, $query);
    $x = mysqli_num_rows($result);
    
}
else
{
    header("location:index.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
    </head>
    <Style>

        body {
            background: #e7e9ed;
            color: #535b61;
            font-family: "Poppins", sans-serif;
            font-size: 14px;
            line-height: 22px;
        }

        form {
            padding: 0;
            margin: 0;
            display: inline;
        }

        img {
            vertical-align: inherit;
        }

        a, a:focus {
            color: #0071cc;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        a:hover, a:active {
            color: #0c2f55;
            text-decoration: none;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        a:focus, a:active,
        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus,
        button:focus,
        button:active {
            outline: none;
        }

        p {
            line-height: 1.9;
        }

        blockquote {
            border-left: 5px solid #eee;
            padding: 10px 20px;
        }

        iframe {
            border: 0 !important;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #0c2f54;
            font-family: "Poppins", sans-serif;
        }

        .table {
            color: #535b61;
        }

        .table-hover tbody tr:hover {
            background-color: #f6f7f8;
        }

        /* =================================== */
        /*  Helpers Classes
        /* =================================== */
        /* Border Radius */
        .rounded-top-0 {
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
        }

        .rounded-bottom-0 {
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        .rounded-left-0 {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
        }

        .rounded-right-0 {
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        /* Text Size */
        .text-0 {
            font-size: 11px !important;
            font-size: 0.6875rem !important;
        }

        .text-1 {
            font-size: 12px !important;
            font-size: 0.75rem !important;
        }

        .text-2 {
            font-size: 14px !important;
            font-size: 0.875rem !important;
        }

        .text-3 {
            font-size: 16px !important;
            font-size: 1rem !important;
        }

        .text-4 {
            font-size: 18px !important;
            font-size: 1.125rem !important;
        }

        .text-5 {
            font-size: 21px !important;
            font-size: 1.3125rem !important;
        }

        .text-6 {
            font-size: 24px !important;
            font-size: 1.50rem !important;
        }

        .text-7 {
            font-size: 28px !important;
            font-size: 1.75rem !important;
        }

        .text-8 {
            font-size: 32px !important;
            font-size: 2rem !important;
        }

        .text-9 {
            font-size: 36px !important;
            font-size: 2.25rem !important;
        }

        .text-10 {
            font-size: 40px !important;
            font-size: 2.50rem !important;
        }

        .text-11 {
            font-size: 44px !important;
            font-size: 2.75rem !important;
        }

        .text-12 {
            font-size: 48px !important;
            font-size: 3rem !important;
        }

        .text-13 {
            font-size: 52px !important;
            font-size: 3.25rem !important;
        }

        .text-14 {
            font-size: 56px !important;
            font-size: 3.50rem !important;
        }

        .text-15 {
            font-size: 60px !important;
            font-size: 3.75rem !important;
        }

        .text-16 {
            font-size: 64px !important;
            font-size: 4rem !important;
        }

        .text-17 {
            font-size: 72px !important;
            font-size: 4.5rem !important;
        }

        .text-18 {
            font-size: 80px !important;
            font-size: 5rem !important;
        }

        .text-19 {
            font-size: 84px !important;
            font-size: 5.25rem !important;
        }

        .text-20 {
            font-size: 92px !important;
            font-size: 5.75rem !important;
        }

        /* Line height */
        .line-height-07 {
            line-height: 0.7 !important;
        }

        .line-height-1 {
            line-height: 1 !important;
        }

        .line-height-2 {
            line-height: 1.2 !important;
        }

        .line-height-3 {
            line-height: 1.4 !important;
        }

        .line-height-4 {
            line-height: 1.6 !important;
        }

        .line-height-5 {
            line-height: 1.8 !important;
        }

        /* Font Weight */
        .font-weight-100 {
            font-weight: 100 !important;
        }

        .font-weight-200 {
            font-weight: 200 !important;
        }

        .font-weight-300 {
            font-weight: 300 !important;
        }

        .font-weight-400 {
            font-weight: 400 !important;
        }

        .font-weight-500 {
            font-weight: 500 !important;
        }

        .font-weight-600 {
            font-weight: 600 !important;
        }

        .font-weight-700 {
            font-weight: 700 !important;
        }

        .font-weight-800 {
            font-weight: 800 !important;
        }

        .font-weight-900 {
            font-weight: 900 !important;
        }

        /* Opacity */
        .opacity-0 {
            opacity: 0;
        }

        .opacity-1 {
            opacity: 0.1;
        }

        .opacity-2 {
            opacity: 0.2;
        }

        .opacity-3 {
            opacity: 0.3;
        }

        .opacity-4 {
            opacity: 0.4;
        }

        .opacity-5 {
            opacity: 0.5;
        }

        .opacity-6 {
            opacity: 0.6;
        }

        .opacity-7 {
            opacity: 0.7;
        }

        .opacity-8 {
            opacity: 0.8;
        }

        .opacity-9 {
            opacity: 0.9;
        }

        .opacity-10 {
            opacity: 1;
        }

        /* Background light */
        .bg-light-1 {
            background-color: #e9ecef !important;
        }

        .bg-light-2 {
            background-color: #dee2e6 !important;
        }

        .bg-light-3 {
            background-color: #ced4da !important;
        }

        .bg-light-4 {
            background-color: #adb5bd !important;
        }

        @media print {
            .table td, .table th {
                background-color: transparent !important;
            }

            .table td.bg-light, .table th.bg-light {
                background-color: #FFF !important;
            }

            .table td.bg-light-1, .table th.bg-light-1 {
                background-color: #f9f9fb !important;
            }

            .table td.bg-light-2, .table th.bg-light-2 {
                background-color: #f8f8fa !important;
            }

            .table td.bg-light-3, .table th.bg-light-3 {
                background-color: #f5f5f5 !important;
            }

            .table td.bg-light-4, .table th.bg-light-4 {
                background-color: #eff0f2 !important;
            }

            .table td.bg-light-5, .table th.bg-light-5 {
                background-color: #ececec !important;
            }
        }
        /* =================================== */
        /*  Layouts
        /* =================================== */
        .itinerary-container {
            margin: 15px auto;
            padding: 70px;
            max-width: 850px;
            background-color: #fff;
            border: 1px solid #ccc;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -o-border-radius: 6px;
            border-radius: 6px;
        }

        @media (max-width: 767px) {
            .itinerary-container {
                padding: 35px 20px 70px 20px;
                margin-top: 0px;
                border: none;
                border-radius: 0px;
            }
        }
        /* =================================== */
        /*  Extras
        /* =================================== */
        .bg-primary, .badge-primary {
            background-color: #0071cc !important;
        }

        .bg-secondary {
            background-color: #0c2f55 !important;
        }

        .text-secondary {
            color: #0c2f55 !important;
        }

        .text-primary {
            color: #0071cc !important;
        }

        .btn-link {
            color: #0071cc;
        }

        .btn-link:hover {
            color: #0e7fd9 !important;
        }

        .border-primary {
            border-color: #0071cc !important;
        }

        .border-secondary {
            border-color: #0c2f55 !important;
        }

        .btn-primary {
            background-color: #0071cc;
            border-color: #0071cc;
        }
        .btn-primary:hover {
            background-color: #0e7fd9;
            border-color: #0e7fd9;
        }

        .btn-secondary {
            background-color: #0c2f55;
            border-color: #0c2f55;
        }

        .btn-outline-primary {
            color: #0071cc;
            border-color: #0071cc;
        }
        .btn-outline-primary:hover {
            background-color: #0071cc;
            border-color: #0071cc;
            color: #fff;
        }

        .btn-outline-secondary {
            color: #0c2f55;
            border-color: #0c2f55;
        }
        .btn-outline-secondary:hover {
            background-color: #0c2f55;
            border-color: #0c2f55;
            color: #fff;
        }

        .progress-bar,
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: #0071cc;
        }

        .page-item.active .page-link,
        .custom-radio .custom-control-input:checked ~ .custom-control-label:before,
        .custom-control-input:checked ~ .custom-control-label::before,
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label:before,
        .custom-control-input:checked ~ .custom-control-label:before {
            background-color: #0071cc;
            border-color: #0071cc;
        }

        .list-group-item.active {
            background-color: #0071cc;
            border-color: #0071cc;
        }

        .page-link {
            color: #0071cc;
        }
        .page-link:hover {
            color: #0e7fd9;
        }

        /* Pagination */
        .page-link {
            border-color: #f4f4f4;
            border-radius: 0.25rem;
            margin: 0 0.3rem;
        }

        .page-item.disabled .page-link {
            border-color: #f4f4f4;
        }

    </style>
    <body>


        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
               
                echo "<form action='' method='post'>";
                echo '<main>
            <div class="row mt-5"style="border: 1px solid gray; margin-left: 200px; margin-right: 200px;">
               
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center trip-title">
                        
                        <div class="col-5 col-md-auto text-center text-md-left"  >
                          <h5 class="m-0">' . $row1['Departure'] . '</h5>
                        </div>
                        <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                        <div class="col-5 col-md-auto text-center text-md-left">
                          <h5 class="m-0">' . $row1['arrival'] . '</h5>
                        </div>
                            <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">Every Day</div>
                        </div>
                        <div>
                            <button style="float:right" name="book"><a href="Book_ticket.php?FID='.$row1['Flight_Number'].' & Price='.$row1['fair'].'">Book</a></butoon>
                        </div>
                        </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-3 text-center company-info"> <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight Number</span> <span class="text-muted d-block">' . $row1['Flight_Number'] . '</span></div>
                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">Departure Time</span> <span class="text-muted d-block">' . $row1['D_time'] . '</span> </div>
                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-4 font-weight-500 text-dark">Arrival Time</span> <span class="text-muted d-block">' . $row1['A_time'] . '</span> </div>
                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">' . $row1['class_name'] . '</span> <span class="text-muted d-block">' . $row1['fair'] . '</span> </div>
                        </div>
                    </div>
                </div>    
                
        </main>';
                echo "</form>";
            }
        } else {
            echo "<h3><center>Data not found</center></h3>";
        }
                     ?>   
                     
                        
        <p class="text-center d-print-none"><a href="index.php">&laquo; Back to Search</a></p>
    </body>

</html>
