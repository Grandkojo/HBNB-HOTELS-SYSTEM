<?php
include "config.php";
// check if user is loged in
if (!isset($_SESSION['admin_lastname'])) {
    header("location: ../index.php");
    exit;
}
// end check
$page = isset($_GET['page']) ? trim(strtolower($_GET['page'])) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="../images/admin-svgrepo-com.png">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- <link rel="icon" href="../images/admin.png"> -->
    <title id="pageTitle">Admin Page</title>
    <style>
        body {
            height: 100vh;
            background-color: rgba(192, 192, 192, 0.7);
        }

        .fa.fa-bed {
            display: flex;
            font-size: 3em;
            margin-left: 17px;
            margin-top: 17px;
        }

        .fa.fa-calendar {
            display: flex;
            font-size: 3em;
            margin-left: 20px;
            margin-top: 17px;
        }

        .fa.fa-home {
            color: black;
        }

        /* .fa.fa-cog {
            color: black;
        } */

        .fa.fa-home:hover {
            color: white;
        }

        .fa.fa-cog:hover {
            color: white;
        }

        .hover-effect-1:hover {
            color: darkgoldenrod;
        }

        .hover-effect-2:hover {
            color: palevioletred;
        }

        .hover-effect-3:hover {
            color: gray;
        }

        .hover-effect-4:hover {
            color: rgba(0, 0, 255, 0.88);
        }

        .hover-effect-5:hover {
            color: red;
        }

        .custom_header {
            height: 90px;
        }

        .custom-navbar {
            height: 100vh;
            overflow-y: auto;
        }

        .custom_font {
            font-size: 40px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, serif"

        }

        .custom_font_1 {
            font-size: 35px;
        }
        
        .fa.fa-arrow-left{
            color: black;
        }
        .fa.fa-arrow-right{
            color: black;
        }
        @media (max-width: 768px) {
            .custom_header {
                height: 70px;
            }

            .custom_font {
                font-size: 20px;
            }

            .custom_font_1 {
                font-size: 15px;
            }
        }

        .fa.fa-home {
            font-size: 30px;
        }

        @media (max-width: 768px) {
            .fa.fa-home {
                font-size: 20px;
            }
        }

        /* .fa.fa-cog {
            font-size: 30px;
        } */

        @media (max-width: 768px) {
            .fa.fa-cog {
                font-size: 20px;
            }
        }
    </style>
</head>

<body style="width: auto;">

    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary sticky-top">
            
            <!-- <div class="row d-flex align-items-center bg-primary sticky-top fixed-top custom_header"> -->
                <div class="col-2 col-md-1 col-sm-2 col-lg-1 pt-0 pt-sm-0 pt-lg-0 pt-md-0 d-flex justify-content-center align-items-center">
                    <img src="<?php echo $_SESSION["admin_image"] ?>" height="40px" width="40px" class="rounded-circle">
                </div>
                <div class="col-md col-6 col-sm-8 col-lg">
                    <span class="ps-md-3 ps-0 ps-lg-3 ps-sm-0 custom_font"><strong> Welcome, </strong></span>
                    <?php
                    echo '<span class="custom_font_1">' . $_SESSION["admin_lastname"] . " " .  $_SESSION["admin_firstname"] . '</span>';
                    ?>
                </div>
                <div class="col-md col-4 col-sm-2 col-lg d-flex justify-content-lg-end justify-content-md-end justify-content-sm-end justify-content-end me-0 me-sm-0 me-md-4 me-lg-4">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
                        <i class="fa fa-bars fa-2x text-dark" aria-hidden="true"></i>
                    </button>
                    <!-- <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index_for_admin.php" aria-current="page">
                                <i class="me-0 me-sm-0 me-md-2 me-lg-2 fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="me-0 me-sm-0 me-md-2 fa fa-cog" aria-hidden="true"></i> </a>
                        </li>
                    </ul> -->
    
    
                </div>
    
            <!-- </div> -->
        </nav>
    </div>

    <div class="offcanvas offcanvas-start text-bg-dark" id="menu">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title">ADMIN - HBNB</h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body text-start text-light" style="font-size: large;">
            </p><a class="nav-link <?php echo $page == "" ? "active text-primary" : "" ?>" href="admin_page.php?page="><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
            <p>
            <p>
                <a class="nav-link <?php echo $page == "available_rooms" ? "active text-primary" : "" ?>" href="admin_page.php?page=available_rooms"><i class="fa fa-search-plus" aria-hidden="true"></i> Available</a>

            </p>
            <p>
                <a class="nav-link <?php echo $page == "categories" ? "active text-primary" : "" ?>" href="admin_page.php?page=categories"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Categories</a>
            </p>
            <p>
                <a class="nav-link <?php echo $page == "utilities" ? "active text-primary" : "" ?>" href="admin_page.php?page=utilities"><i class="fa fa-asterisk" aria-hidden="true"></i> Utilities</a>
            </p>
            <hr>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room"><i class="fa fa-plus-circle" aria-hidden="true"></i> Book room</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_room"><i class="fa fa-pencil" aria-hidden="true"></i> Edit room</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "add_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "edit_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_category"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Category</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "add_utility" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_utility"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Utility</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "room_display" ? "active text-primary" : "" ?>" href="admin_page.php?page=room_display"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirmed Reservations</a>
            </p>
            <p>
                <a class="nav-link disabled text-secondary <?php echo $page == "pending_reservations" ? "active text-primary" : "" ?>" href="admin_page.php?page=pending_reservations"><i class="fa fa-pause" aria-hidden="true"></i> Pending Reservations</a>
            </p>
            <hr>
            <p>
            <a class="nav-link" href="#"><i class="me-0 me-sm-0 me-md-2 fa fa-cog" aria-hidden="true"></i> Settings</a>
            </p>
            <p>
                <a class="nav-link <?php echo $page == "logout" ? "active text-primary" : "" ?>" href="admin_page.php?page=logout"><i class="fa fa-sign-in" aria-hidden="true"></i> Log Out</a>
            </p>
            <p>
                <a class="nav-link <?php echo $page == "contact" ? "active text-primary" : "" ?>" href="admin_page.php?page=contact"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
            </p>
        </div>
    </div>

    <!-- <div class="container-fluid mt-3">
        <h3>Responsive Offcanvas Menu</h3>
        <p>You can also hide or show the offcanvas menu on different screen widths, with the .offcanvas-sm|md|lg|xl|xxl classes.</p>
        <p>In this example, we hide the offcanvas menu on screens larger than 991px wide. Note that we also hide the button that opens the offcanvas (d-lg-none).</p>
        <p class="text-bg-danger">Resize the browser window to see the result.</p>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            Open Offcanvas Sidebar
        </button>
    </div> -->

    <!-- Side bar -->
    <!-- <div class="col-md-2" style="height: 100%">
        <!-- 100vh
        <nav class="navbar navbar-expand-md navbar-expand-lg navbar-collapse-sm navbar-collapse navbar-dark bg-dark postion-fixed custom-navbar" style="height: 100%;">
            <!-- <h5>Sample Heading</h5> 
            <div class="container-fluid" style="display: flex; justify-content: flex-start; align-items: flex-start; height:100vh;">
                <!-- Hamburger Menu Button 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                </button>


                <!-- Navbar Links 
                <div class="container-fluid collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav nav-tabs flex-column" role="tablist"> -->
    <!-- <div class="col-md-2" style="height: 100%;">
        <nav class="navbar navbar-expand-md navbar-expand-lg navbar-collapse-sm navbar-collapse navbar-dark bg-dark position-fixed custom-navbar" style=" height: 100%">
            <button class="navbar-toggler d-md-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-tabs flex-column" role="tablist"> -->
    <div class="row">
        <!-- <div class="col-12 col-md-2"> -->
        <!-- <nav class=" navbar navbar-expand-md navbar-expand-lg navbar-collapse-sm navbar-collapse navbar-dark bg-dark"> -->
        <!-- <button class="navbar-toggler d-md-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button> -->
        <!-- <div class="container-fluid" style="display: flex; justify-content: flex-start; align-items: flex-start; height:100vh;"> -->

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav-tabs flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "" ? "active text-primary" : "" ?>" href="admin_page.php?page="><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <hr class="text-bg-dark">

                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "available_rooms" ? "active text-primary" : "" ?>" href="admin_page.php?page=available_rooms"><i class="fa fa-search-plus" aria-hidden="true"></i> Available</a>
                </li>
                <hr class="text-bg-dark">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "categories" ? "active text-primary" : "" ?>" href="admin_page.php?page=categories"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Categories</a>
                </li>
                <hr class="text-bg-dark">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "utilities" ? "active text-primary" : "" ?>" href="admin_page.php?page=utilities"><i class="fa fa-asterisk" aria-hidden="true"></i> Utilities</a>
                </li>
                <hr class="text-bg-dark">
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room"><i class="fa fa-plus-circle" aria-hidden="true"></i> Book room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_room"><i class="fa fa-pencil" aria-hidden="true"></i> Edit room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "add_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "edit_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_category"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "add_utility" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_utility"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Utility</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "room_display" ? "active text-primary" : "" ?>" href="admin_page.php?page=room_display"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirmed Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled <?php echo $page == "pending_reservations" ? "active text-primary" : "" ?>" href="admin_page.php?page=pending_reservations"><i class="fa fa-pause" aria-hidden="true"></i> Pending Reservations</a>
                </li>
                <hr class="text-bg-dark">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "logout" ? "active text-primary" : "" ?>" href="admin_page.php?page=logout"><i class="fa fa-sign-in" aria-hidden="true"></i> Log Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == "contact" ? "active text-primary" : "" ?>" href="admin_page.php?page=contact"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- </nav> -->
    </div>
    <!-- end side bar -->

    <div class="col-12-md col-lg-12 pe-0">
        <!-- content here -->

        <?php


        switch (strtolower($page)) {
            case 'room_display':
                include "pages/roomDisplay.php";
                break;

            case 'categories':
                include "pages/categories.php";
                break;

            case 'utilities':
                include "pages/utilities.php";
                break;

            case 'add_category';
                include "pages/addCategory.php";
                break;

            case 'edit_category':
                include "pages/editCategory.php";
                break;

            case 'book_room':
                include "pages/bookRoom.php";
                break;

            case 'add_room':
                include "pages/addRoom.php";
                break;

            case 'edit_room':
                include "pages/editRoom.php";
                break;

            case 'pending_reservations':
                include "pages/pendingReservations.php";
                break;

            case 'edit_residence':
                include "pages/editResidence.php";
                break;

            case 'add_utility':
                include "pages/addUtility.php";
                break;

            case 'available_rooms':
                include "pages/availableRooms.php";
                break;

            case 'logout':
                unset($_SESSION['admin_email']);
                unset($_SESSION['admin_lastname']);
                unset($_SESSION['admin_firstname']);
                unset($_SESSION['admin_image']);
                // session_unset();
                // session_destroy(); ?>

                <script>
                    window.location.href = "../index_for_admin.php";
                    // location.reload();
                </script>
        <?php break;

            case 'contact':
                include "pages/contact.php";
                break;

            default:
                include "pages/dashboard.php";
                break;
        }
        ?>

        <!-- end content here -->
    </div>
    </div>












































































































































    <!-- <div class="col-10">
            <h2 style="margin-left:2em; font-size: 40px;"><strong>HBNB Online Management System - Admin Panel</strong></h2>
            <hr style="height:3px; border:0; background-color: blue;">

            <span class="hover-effect-1">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-dark" style="display: inline-block; width:90px; height:80px; background-color: orange; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Inactive Rooms</span>
                </span>
            </span>
            <span class="hover-effect-2">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: palevioletred; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Inactive Rooms</span>
                </span>
            </span>
            <span class="hover-effect-3">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: gray; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Pending Reservations</span>
                </span>
            </span>
            <span class="hover-effect-4">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 bg-primary text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Confirmed Reservations</span>
                </span>
            </span>
            <span class="hover-effect-5">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 bg-danger text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Cancelled Reservations</span>
                </span>
            </span>
        </div> -->
    </row>












</body>

</html>