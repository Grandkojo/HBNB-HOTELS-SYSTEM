<?php
    include "config.php";

    //Retrieve form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $pswd = $_POST["pswd"];

        $checkQuery = "SELECT * FROM admin_details WHERE EMAIL = :email AND PASSKEY = :pswd LIMIT 1";
        $login_validation = $conn->prepare($checkQuery);
        $login_validation->bindparam(':email', $email);
        $login_validation->bindParam(':pswd', $pswd);
        $login_validation->execute();

        if ($login_validation->rowCount() > 0) {
            // Valid email, allow access
            $data = $login_validation->fetch(PDO::FETCH_ASSOC);
            // var_dump($data); exit;
            $_SESSION["admin_lastname"] = $data['LAST_NAME'];
            $_SESSION["admin_firstname"] = $data['FIRST_NAME'];
            $_SESSION["admin_email"] = $data['EMAIL'];
            $_SESSION["admin_image"] = $data['IMAGE'];
            // echo "Data inserted successfully!";
            header("location: admin_page.php");
            exit;     
        }
        else {
            $_SESSION["error"] = "Invalid email or password!";
            header("location: ../index_for_admin.php");
            exit;
        }
    }

     $conn = null;
?> 
