<script>
    function togglePasswordVisibility(ids, eye_icon) {
        let passwordInput = document.getElementById(ids);
        let eyeIcon = document.getElementById(eye_icon);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
</script>
<script>
    function checkPasswordMatch() {
        let passwordInput = document.getElementById("password-input");
        let confirmpasswordInput = document.getElementById("confirmpassword");
        let messageElement = document.getElementById("message");
        if (confirmpasswordInput.value === "") {
            messageElement.innerHTML = "";
        } else if (confirmpasswordInput.value !== passwordInput.value) {
            messageElement.innerHTML = "<small>Passwords do not match</small>";
            result = false;
        } else {
            messageElement.innerHTML = "";
            result = true;
        }
        return result;
    }
</script>
<!-- <script>
        function goBack() {
            window.history.back();
        }
    </script> -->
<script>
    let signupform = document.getElementById("signup");
</script>

<script>
    let formsubmit = document.getElementById("formsubmit");
    let password = document.getElementById("password-input");
    let confirmpassword = document.getElementById("confirmpassword");
    let alert = document.getElementById("alertbutton");


    formsubmit.addEventListener('click', function(event) {
        if (password.value !== confirmpassword.value) {
            alert.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Password does not match.</strong> Check passwords again.
                    </div>`;
            event.preventDefault();
            setTimeout(function() {
                alert.innerHTML = "";
            }, 1500);


        } else {
            // alert.style.display = "none";
            alert.innerHTML = "";
            formsubmit.submit();
        }
    });
</script>

<script>
    function checkValidPassword() {
        let passwordInput = document.getElementById("password-input");
        let validpassword = document.getElementById("validpassword");
        if (passwordInput.value === "") {
            validpassword.innerHTML = "";
        } else if (passwordInput.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
            validpassword.innerHTML = "";
        } else {
            validpassword.innerHTML = "<small>Must contain at least one number, one uppercase, a lowercase letter, and at least 8 or more characters</small>";
        }

    }
</script>

<script>
    let logout = document.getElementById("logOut");
    if (logout) {
        logout.addEventListener('click', function() {
            swal({
                title: "Are you sure?",
                text: "Once logged out, you will have to login again!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willLogout) => {
                if (willLogout) {
                    <?php
                    // session_unset();
                    // session_destroy();    
                    ?>
                    swal("You have been logged out!", {
                        icon: "success",
                    }).then(() => {
                        <?php
                        // session_unset();
                        // session_destroy();
                        ?>
                        location.reload();
                    });
                } else {
                    swal("You are still logged in!");
                }
            });
        });
    }
</script>

<script>
    // Function to hide the alert after 2 seconds
    function hideAlert() {
        var alert = document.getElementById('alertbuttonprofile');
        if (alert) {
            alert.style.display = 'none';
        }
    }

    // Show the alert
    setTimeout(hideAlert, 2000);
</script>


<!-- Extra -->

<script>
    search_form = document.getElementById("search_form");
    if (search_form) {
        search_form.addEventListener('click', function(e) {
            e.preventDefault();

            let searchInput = document.getElementById("search_input");
            if (searchInput.value === "") {
                // alert("Please enter something");
            } else {
                search_form.submit();
            }
        })
    }
</script>

<script>
    var searchInput = document.getElementById('search_input');
    var searchContainer = document.querySelector('.search_container');
    var searchButton = document.getElementById('search_button');

    function expandInput() {
        searchContainer.classList.add('open');
    }

    function collapseInput() {
        searchContainer.classList.remove('open');
    }
</script>
<!-- <script>
    let email = document.getElementById('forgotpassword_submit');
    let forgotPasswordForm = document.getElementById('forgotpasswordform');
    if (email) {
        email.addEventListener('click', function(e) {
            e.preventDefault();
            swal("Email sent!", "Check your email for further instructions", "success")
                .then((result) => {
                    if (result) {
                        // window.location.href = "admin/modals/forgotPassword.php";
                        forgotPasswordForm.submit();
                        location.reload();
                    }
                })
        })
    }
</script> -->

<script>
    let email = document.getElementById('forgotpassword_submit');
    if (email) {
        email.addEventListener('click', function(e) {
            e.preventDefault();
            swal("Email sent!", "Check your email for further instructions", "success")
            .then((result) => {
            if (result) {
                // window.location.href = "admin/modals/forgotPassword.php";
                email.submit();
                location.reload();
            }
        })
        })
    }
</script>

<script>
    let emailButton = document.getElementById('forgotpassword_submit');

    if (emailButton) {
        emailButton.addEventListener('click', function(e) {
            e.preventDefault();
            swal("Email sent!", "Check your email for further instructions", "success")
            .then((result) => {
                if (result) {
                    let form = document.getElementById('forgotpasswordform');
                    
                    if (form) {
                        form.submit();
                        // location.reload();
                    } else {
                        console.error('Form not found.');
                    }
                }
            });
        });
    }
</script>

<script>
    function showResult(str) {
  if (str.length==0) {
    document.getElementById("search_results").innerHTML="";
    document.getElementById("search_results").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        let $search_results = document.getElementById("search_results");
      $search_results.innerHTML=this.responseText;
      $search_results.style.border="1px solid #A5ACB2";
      $search_results.style.boxShadow="0px 0px 10px 0px #A5ACB2";
      $search_results.style.borderRadius="20px";
      $search_results.style.width="20%";
      $search_results.style.textAlign="center";
      $search_results.style.position="fixed";
      $search_results.style.backgroundColor="white";
    }
  }
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
}
</script>

<script>
    function handleLike(like_icon_id, modal_id) {
        if (<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>) {;
            let like = document.getElementById(like_icon_id);
            if (like) {
                if (like.classList.contains("fa-heart-o")) {
                like.classList.remove("fa-heart-o");
                like.classList.add('fa-heart');
                } else {
                    like.classList.remove("fa-heart");
                    like.classList.add('fa-heart-o');
                }
            }
        } else {
            openModal(modal_id)
        }
    }

    function openModal(modal_id) {
        let myModal = new bootstrap.Modal(document.getElementById(modal_id));
        myModal.show();
    }
</script>

</script>