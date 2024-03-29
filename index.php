<?php

include "admin/config.php";

$firstname  = isset($_GET['firstname']) ? trim(strtolower($_GET['firstname'])) : '';
$lastname = isset($_GET['lastname']) ? trim(strtolower($_GET['lastname'])) : '';
$email = isset($_GET['email']) ? trim(strtolower($_GET['email'])) : '';
$phone = isset($_GET['phone']) ? trim(strtolower($_GET['phone'])) : '';


$page = isset($_GET['page']) ? trim(strtolower($_GET['page'])) : '';
$residence = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/hbnb.png">
    <title>HBNB</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <div class="container-fluid sticky-top bg-light pt-2">
        <div class="row display">
            <div class="col-md-2 col-sm-12 d-flex justify-content-center align-items-center pe-5">
                <img src="images/hbnb_logo.png" width="85" height="35" alt="logo" style="margin-left: 20px;">
            </div>
            <div class="col-md-7 col-9 d-flex justify-content-lg-center justify-content-md-center align-items-lg-center align-items-md-center justify-content-start align-items-start  ps-2 pe-2">
                <!-- <div class="container_search bg-light border border-2 border-secondary"> -->
                <form action="index.php" method="post" autocomplete="off" id="search_form">
                    <div class="search_container">
                        <input id="search_input" name="search" type="text" placeholder="Residences..." autocomplete="off" class="text-center" onkeyup="showResult(this.value)" onfocus="expandInput()" onblur="collapseInput()" style="font-size: small;">
                        <button id="search_button" onfocus="expandInput()" onblur="collapseInput()">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div id="search_results"></div>
                </form>
                
            </div>
            <?php
            include "roomTypes/index_standard.php";
            ?>
            <?php if (!isset($_SESSION['email'])) { ?>
                <!-- FRESH USER -->
                <div class="col-md-3 col-3 d-flex justify-content-center align-items-center">
                    <div class="dropdown">
                        <button type="button" class="btn btn-light border border-2 rounded-pill dropdown-toggle" data-bs-toggle="dropdown" style="width: 80px; height: 40px">
                            <i class="fa fa-bars" style="float: left; padding-top: 5px; padding-right: 5px;" aria-hidden="true"></i>
                            <i class="fa fa-user-circle" aria-hidden="true" style=" float: right; padding-bottom: 10px; color:gray; font-size: 24px;"></i>
                        </button>
                        <ul class="dropdown-menu border border-2 border-primary rounded-2">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalId" href="#"><small>Sign Up</small></a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginmodal" href="#"><small>Login</small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index_for_admin.php" target="_blank"><small>Login - Admin</small></a></li>
                        </ul>
                    </div>
                </div>
                <!-- USER LOGS IN WITH PROFILE REGISTERED -->
            <?php
            } elseif (isset($_SESSION['email'])  && !empty($_SESSION['profile'])) {
                
            ?>
                <div class="col-md-3 col-3 d-flex justify-content-center align-items-center">
                    <p class="d-flex align-items-center me-3 pt-4"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <div class="dropdown">
                        <!-- <i class="fa fa-user-circle dropdown-toggle mt-3" data-bs-toggle="dropdown" aria-hidden="true" style=" float: right; color:gray; font-size: 70px; cursor: pointer;" aria-hidden="true"></i> -->
                        <img src="<?php echo $_SESSION['profile']; ?>" alt="user_profile" class="rounded-circle dropdown-toggle" data-bs-toggle="dropdown" style=" float: right; color:gray; font-size: 24px; width: 75px; height: 80px; box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); cursor: pointer;" aria-hidden="true">
                        <ul class="dropdown-menu border border-2 border-primary rounded-2">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_profile" href="admin/modals/login.php"><small><i class="fa fa-edit" aria-hidden="true" id="editProfileLink"></i> Edit profile</small></a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginmodal" href="#"><small><i class="fa fa-bar-chart" aria-hidden="true"></i> Activities</small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" id="logOut"><small><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</small></a></li>
                        </ul>
                    </div>
                </div>

                <!-- USER LOGS IN WITHOUT PROFILE REGISTERED -->
            <?php } else { ?>
                <div class="col-md-3 col-3 d-flex justify-content-center align-items-center">
                    <p class="d-flex align-items-center me-3 pt-4 mt-3"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
                    <div class="dropdown">
                        <i class="fa fa-user-circle dropdown-toggle mt-3" data-bs-toggle="dropdown" aria-hidden="true" style=" float: right; color:gray; font-size: 70px; cursor: pointer;" aria-hidden="true"></i>
                        <!-- <img src="images/scenery.jpg" alt="user_profile" class="rounded-circle dropdown-toggle" data-bs-toggle="dropdown" style=" float: right; color:gray; font-size: 24px; width: 75px; height: 80px; box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); cursor: pointer;" aria-hidden="true"> -->
                        <ul class="dropdown-menu border border-2 border-primary rounded-2">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_profile" href="admin/modals/login.php"><small><i class="fa fa-edit" aria-hidden="true" id="editProfileLink"></i> Edit profile</small></a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginmodal" href="#"><small><i class="fa fa-bar-chart" aria-hidden="true"></i> Activities</small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" id="logOut"><small><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</small></a></li>
                        </ul>
                    </div>
                </div>
                <?php
                ?>

            <?php } ?>

            <hr class="mt-3 mt-md-3 mt-lg-5">
        </div>

        <div class="row mt-3 bg-light">
            <div class="col-md-2"></div>
            <div class="col-md-7 d-flex justify-content-center">
                <nav class="nav text-secondary" style="font-size: larger;">
                    <a class="nav-link <?php echo $page == "" ? "active text-primary" : "" ?>" href="index.php">Standard</a>
                    <a class="nav-link <?php echo $page == "business_room" ? "active text-primary" : "" ?>" href="index.php?page=business_room">Business</a>
                    <a class="nav-link <?php echo $page == "luxury_room" ? "active text-primary" : "" ?>" href="index.php?page=luxury_room">Luxury</a>
                </nav>
                <hr class="mt-5">
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- <hr class="bg-light"> -->
    <div class="row mt-5 me-4 ms-4">
        <?php
        switch (strtolower($page)) {
            case 'business_room';
                include "roomTypes/business.php";
                break;
            case 'luxury_room';
                include "roomTypes/luxury.php";
                break;
        }
        ?>
        <?php
        if (!is_array($residence) || empty($residence)) {
            foreach ($result as $room) {
                $_SESSION["residence_name"] = $room['NAME'];
        ?>

                <div class="col-md-4 col-12 col-sm-6 col-lg-2 d-flex justify-content-center ps-3">
                    <!-- <div class="col-md-3"> -->
                    <div class="image-container ms-1 position-relative">
                        <!-- like -->
                        <i class="fa fa-heart-o position-absolute top-0 end-0 mt-3 me-3" onclick="handleLike('like-<?php echo $room['ID']?>', 'modalId')" aria-hidden="true" style="cursor: pointer; color:palevioletred;" id="like-<?php echo $room['ID'] ?>"></i>
                        <!-- end like -->
                        <img class="modals shadow" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>" src="<?php echo $room['PICTURE'] ?>" alt="1">
                        <br>
                        <!-- change -->
                        <div class="row">
                            <div class="col-8">
                                <a class="modals" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>"><span>
                                        <strong style="font-size: medium;">
                                            <p class="ms-3" style="font-size: medium; font-family:'Times New Roman', Times, serif"><?php echo $room['LOCATION'] ?>
                                        </strong><br>$<?php echo $room['PRICE'] ?> per night</p>
                                    </span>
                                </a>
                            </div>
                            <div class="col-4" style="font-size: small;">
                                <i class="fa fa-star d-inline" aria-hidden="true">
                                    <p class="d-inline"> 4.45</p>
                                </i>

                            </div>
                        </div>
                        <!-- end change -->
                    </div>
                </div>


                <div class="modal fade custom-modal" id="myModal<?php echo $room['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $room['NAME'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <small>
                                    <h5>Utilities</h5>
                                </small>
                                <div class="container">
                                    <?php
                                    foreach ($utility as $util) {
                                    ?>
                                        <div class="row">
                                            <div class="col-1">
                                                <?php if ($room['AC_AVAILABILITY'] == "AVAILABLE") { ?>
                                                    <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                                <?php } elseif ($room['AC_AVAILABILITY'] == "N/A") { ?>
                                                    <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                                <?php } ?>
                                            </div>
                                            <?php



                                            ?>
                                            <div class="col-4">
                                                <small><?php echo $util['NAME']; ?></small><br>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <br>
                                <div class="container-fluid">
                                    <p style="word-wrap: break-word;"> <?php echo $room['DESCRIPTION']; ?></p>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <p><strong>$<?php echo $room['PRICE'] ?></strong> night</p>
                                <br>
                                <form action="booking_confirmed.php?state=right&residence_name=<?php echo $room['NAME'] ?>" method="post">
                                    <input type="submit" value="Continue" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if (isset($_SESSION["notloggedin"])) {

                if (($locate_signup = isset($_GET['locate_signup'])) && ($_GET['locate_signup'] == "modalId")) {
                    if (($state = isset($_GET['state'])) && ($_GET['state'] == "right")) {
                ?>
                        <script>
                            window.addEventListener('DOMContentLoaded', function() {
                                var modal = new bootstrap.Modal(document.getElementById('modalId'));
                                modal.show();
                            });
                        </script>
            <?php
                    }
                }
            }
            unset($_SESSION["notloggedin"]);

            
        } else { ?>

            <?php foreach ($residence as $room) { ?>
                <div class="col-md-2">
                    <div class="image-container ms-1 position-relative">
                        <img class="modals shadow" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>" src="<?php echo $room['PICTURE'] ?>" alt="1">
                        <!-- like -->
                        <i class="fa fa-heart-o position-absolute top-0 end-0 mt-3 me-3" onclick="handleLike('like-<?php echo $room['ID']?>', 'modalId')" aria-hidden="true" style="cursor: pointer; color: palevioletred" id="like-<?php echo $room['ID'] ?>"></i>
                        <!-- end like -->
                        <br>
                        <!-- change -->
                        <div class="row">
                            <div class="col-8">
                                <a class="modals" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>"><span>
                                        <strong style="font-size: medium;">
                                            <p class="ms-3" style="font-size: medium; font-family:'Times New Roman', Times, serif"><?php echo $room['LOCATION'] ?>
                                        </strong><br>$<?php echo $room['PRICE'] ?> per night</p>
                                    </span>
                                </a>
                            </div>
                            <div class="col-4" style="font-size: small;">
                                <i class="fa fa-star d-inline" aria-hidden="true">
                                    <p class="d-inline"> 4.45</p>
                                </i>

                            </div>
                        </div>
                        <!-- end change -->
                    </div>
                </div>


                <div class="modal fade custom-modal" id="myModal<?php echo $room['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $room['NAME'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <small>
                                    <h5>Utilities</h5>
                                </small>
                                <div class="container">
                                    <?php
                                    foreach ($utility as $util) {
                                    ?>
                                        <div class="row">
                                            <div class="col-1">
                                                <?php if ($room['AC_AVAILABILITY'] == "AVAILABLE") { ?>
                                                    <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                                <?php } elseif ($room['AC_AVAILABILITY'] == "N/A") { ?>
                                                    <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                                <?php } ?>
                                            </div>
                                            <?php
                                            ?>
                                            <div class="col-4">
                                                <small><?php echo $util['NAME']; ?></small><br>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <br>
                                <div class="container-fluid">
                                    <p style="word-wrap: break-word;"> <?php echo $room['DESCRIPTION']; ?></p>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <p><strong>$<?php echo $room['PRICE'] ?></strong> night</p>
                                <br>
                                <?php unset($_SESSION["state"]); ?>
                                <form action="booking_confirmed.php" method="post">
                                    <input type="submit" value="Continue" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        }
        ?>

    </div>

    <!-- Modal Body -->
    <form id="myForm" action="admin/modals/signup.php?state=yes" method="post">
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header d-flex text-center">
                        <h5 class="modal-title" id="modalTitleId" style="margin-left: 150px; margin-top: 10px">
                            <small>
                                <p>Login or signup</p>
                            </small>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"><strong>
                            <p style="font-size: 30px;">Welcome to HBNB!</p>
                        </strong>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="country" id="country" placeholder="" required />
                            <label for="country">Country/Region</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="" required />
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required />
                            <label for="firstname">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required />
                            <label for="lastname">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="" required />
                            <label for="email">Email</label>
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalsignup" href="#" id="signup" class="btn btn-danger form-control">Continue</button>
                        <p class="mt-3 text-center">Already have an account? <a data-bs-toggle="modal" data-bs-target="#loginmodal" href="#">Login</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- continue -->
        <div class="modal fade" id="modalsignup" tabindex="-1" role="dialog" aria-labelledby="modalTitleId1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header d-flex text-center">
                        <i class="fa fa-chevron-circle-left fa-2x text-secondary" aria-hidden="true" onclick="goBack()"></i>
                        <h5 class="modal-title" id="modalTitleId1" style="margin-left: 150px; margin-top: 10px">
                            <small>
                                <p>Login or signup</p>
                            </small>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="alertbutton">

                    </div>


                    <script>
                        var alertList = document.querySelectorAll(".alert");
                        alertList.forEach(function(alert) {
                            new bootstrap.Alert(alert);
                        });
                    </script>

                    <div class="modal-body"><strong>
                            <p style="font-size: 30px;">Create a password</p>
                        </strong>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password-input" placeholder="Enter password" onkeyup="checkValidPassword()" required />
                            <label for="password">Enter password</label>
                            <span class="password-toggle" onclick="togglePasswordVisibility('password-input', 'eye-icon')">
                                <i class="fa fa-eye-slash" id="eye-icon"></i>
                            </span>
                        </div>
                        <p id="validpassword" class="text-primary "></p>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" required oninput="checkPasswordMatch()" />
                            <label for="confirmpassword">Confirm password</label>
                            <span class="password-toggle" onclick="togglePasswordVisibility('confirmpassword', 'eye-icon-a')">
                                <i class="fa fa-eye-slash" id="eye-icon-a"></i>
                            </span>
                        </div>
                        <p id="message" class="text-primary mt-2 ms-2"></p>
                        <button type="submit" id="formsubmit" class="btn btn-danger form-control">Sign Up</button>
                        <p class="mt-3 text-center">Already have an account? <a data-bs-toggle="modal" data-bs-target="#loginmodal" href="#">Login</a></p>

                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET["state"]) && $_SESSION["signup"]) { ?>
            <script>
                window.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('loginmodal'));
                    modal.show();
                });
            </script>
        <?php }
        ?>
    </form>


    <!-- Login -->
    <form action="admin/modals/login.php" method="post">

        <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header d-flex text-center">
                        <i class="fa fa-chevron-circle-left fa-2x text-secondary" aria-hidden="true" onclick="goBack()"></i>
                        <h5 class="modal-title" id="modalTitleId1" style="margin-left: 150px; margin-top: 10px">
                            <small>
                                <p>Login</p>
                            </small>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_SESSION["login_error"])) {

                        if (($locate_login = isset($_GET['locate_login'])) && ($_GET['locate_login'] == "loginmodal")) {
                            // if (($state = isset($_GET['state'])) && ($_GET['state'] == "right")) {
                        ?>
                                <script>
                                    window.addEventListener('DOMContentLoaded', function() {
                                        var modal = new bootstrap.Modal(document.getElementById('loginmodal'));
                                        modal.show();
                                    });
                                </script>
                    <?php
                            }
                        // }?>
                        <div class="alert alert-danger text-center"  id="alertlogin">
                                <?php echo $_SESSION["login_error"]; ?>
                            </div>
                        <?php
                    }
                    unset($_SESSION["login_error"]);
                    ?>


                    <script>
                        var alertList = document.querySelectorAll(".alert");
                        alertList.forEach(function(alert) {
                            new bootstrap.Alert(alert);
                        });
                    </script>

                    <div class="modal-body"><strong>
                            <p style="font-size: 30px;">Welcome Back!</p>
                        </strong>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email_login" id="email_login" placeholder="Enter password" onkeyup="checkValidPassword()" required />
                            <label for="email-login">Enter email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_login" id="password_login" placeholder="Confirm password" required />
                            <label for="confirmpassword">Enter password</label>
                            <span class="password-toggle" onclick="togglePasswordVisibility('password_login', 'eye-icon-login')">
                                <i class="fa fa-eye-slash" id="eye-icon-login"></i>
                            </span>
                        </div>
                        <p class="mt-3 text-center"><a data-bs-toggle="modal" data-bs-target="#forgotpassword" href="#">Forgot password?</a></p>
                        <p id="validpassword" class="text-primary "></p>
                        <button type="submit" id="formsubmit_login" class="btn btn-danger form-control">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Forgot password -->
    <form action="admin/modals/forgotPassword.php" id="forgotpasswordform" method="post">

        <div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="modalTitleId1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header d-flex text-center">
                        <i class="fa fa-chevron-circle-left fa-2x text-secondary" aria-hidden="true" onclick="goBack()"></i>
                        <h5 class="modal-title" id="modalTitleId1" style="margin-left: 120px; margin-top: 10px">
                            <small>
                                <p>Forgot Password</p>
                            </small>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="alertbuttonlogin">

                    </div>


                    <script>
                        var alertList = document.querySelectorAll(".alert");
                        alertList.forEach(function(alert) {
                            new bootstrap.Alert(alert);
                        });
                    </script>

                    <div class="modal-body"><strong>
                            <h5>An email would be sent to you with your password</h5><br>
                        </strong>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email_login" id="email_login" placeholder="Enter password" onkeyup="checkValidPassword()" required />
                            <label for="email-login">Enter email used to sign up</label>
                        </div>
                        
                        <button type="button" id="forgotpassword_submit" class="btn btn-danger form-control">Send Email</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Profile edit -->
    <form action="admin/user/editProfile.php" method="post" id="userprofile" enctype="multipart/form-data">

        <div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="modal_profile" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header d-flex text-center">
                        <h5 class="modal-title" id="modal_profile" style="margin-left: 150px; margin-top: 10px">
                            <small>
                                <p>Edit Profile</p>
                            </small>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <?php
                    if (isset($_SESSION["profile_first_name_error"])) {
                        if ($locate = isset($_GET['locate'])) { ?>
                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var modal = new bootstrap.Modal(document.getElementById('modal_profile'));
                                    modal.show();
                                });
                            </script>
                        <?php } ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertbuttonprofile">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?php echo $_SESSION["profile_first_name_error"]; ?>
                        </div>
                    <?php
                        unset($_SESSION["profile_first_name_error"]);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION["profile_last_name_error"])) {
                        if ($locate = isset($_GET['locate'])) { ?>
                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var modal = new bootstrap.Modal(document.getElementById('modal_profile'));
                                    modal.show();
                                });
                            </script>
                        <?php } ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertbuttonprofile">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?php echo $_SESSION["profile_last_name_error"]; ?>
                        </div>
                    <?php
                        unset($_SESSION["profile_last_name_error"]);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION["profile_email_error"])) {
                        if ($locate = isset($_GET['locate'])) { ?>
                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var modal = new bootstrap.Modal(document.getElementById('modal_profile'));
                                    modal.show();
                                });
                            </script>
                        <?php } ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertbuttonprofile">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?php echo $_SESSION["profile_email_error"]; ?>
                        </div>
                    <?php
                        unset($_SESSION["profile_email_error"]);
                    }
                    ?>



                    <script>
                        var alertList = document.querySelectorAll(".alert");
                        alertList.forEach(function(alert) {
                            new bootstrap.Alert(alert);
                        });
                    </script>


                    <div class="modal-body"><strong>
                        </strong>
                        <div class="mb-3">
                            <label for="profile_image">Profile image (optional)</label>
                            <input type="file" class="form-control" name="profile_images" id="profile_image" placeholder="image">
                            <p class="text-muted text-sm text-center">Profile image updates on your next login</p> 
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_first_name" id="profile_first_name" placeholder="Change name" onkeyup="checkValidName()" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''; ?>" required />
                            <label for="profile_first_name">Change Name - First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_last_name" id="profile_last_name" placeholder="Change name" onkeyup="checkValidName()" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : ''; ?>" required />
                            <label for="profile_last_name">Change Name - Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="profile_email" id="profile_email" placeholder="Change email" onkeyup="checkValidName()" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required />
                            <label for="profile_email">Change Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_phone" id="profile_phone" placeholder="Change phone" onkeyup="checkValidName()" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" required />
                            <label for="profile_phone">Change contact</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_login" id="password_profile" placeholder="Confirm password" required />
                            <label for="confirmpassword">Enter password to confirm</label>
                            <span class="password-toggle" onclick="togglePasswordVisibility('password_profile', 'eye-icon-profile')">
                                <i class="fa fa-eye-slash" id="eye-icon-profile"></i>
                            </span>
                        </div>
                        <p id="validpassword" class="text-primary "></p>
                        <button type="submit" id="formsubmit_profile" class="btn btn-danger form-control">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php
    include "scripts/index_js.php";   
    ?>
</body>

</html>