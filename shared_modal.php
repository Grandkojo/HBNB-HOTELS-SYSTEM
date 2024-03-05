
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
                        <!-- <button type="submit" class="btn btn-danger form-control">Sign Up</button> -->
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
                    <div id="alertbuttonlogin">

                    </div>


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
                            <!-- <p style="font-size: 30px;">An email would be sent to you with your password</p> -->
                            <h5>An email would be sent to you with your password</h5><br>
                        </strong>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email_login" id="email_login" placeholder="Enter password" onkeyup="checkValidPassword()" required />
                            <label for="email-login">Enter email used to sign up</label>
                        </div>

                        <!-- <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_login" id="password_login" placeholder="Confirm password" required />
                            <label for="confirmpassword">Enter password</label>
                            <span class="password-toggle" onclick="togglePasswordVisibility('password_login', 'eye-icon-login')">
                                <i class="fa fa-eye-slash" id="eye-icon-login"></i>
                            </span>
                        </div>
                        <p class="mt-3 text-center"><a data-bs-toggle="modal" data-bs-target="#forgotpassword" href="#">Forgot password?</a></p>
                        <p id="validpassword" class="text-primary "></p> -->
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
                            <input type="file" class="form-control" name="profile_images" id="profile_image" placeholder="image" value="<?php echo $_SESSION['profile'] ?>">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_first_name" id="profile_first_name" placeholder="Change name" onkeyup="checkValidName()" value="<?php echo $_SESSION['firstname'] ?>" required />
                            <label for="profile_first_name">Change Name - First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_last_name" id="profile_last_name" placeholder="Change name" onkeyup="checkValidName()" value="<?php echo $_SESSION['lastname'] ?>" required />
                            <label for="profile_last_name">Change Name - Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="profile_email" id="profile_email" placeholder="Change email" onkeyup="checkValidName()" value="<?php echo $_SESSION['email'] ?>" required />
                            <label for="profile_email">Change Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profile_phone" id="profile_phone" placeholder="Change phone" onkeyup="checkValidName()" value="<?php echo $_SESSION['phone'] ?>" required />
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