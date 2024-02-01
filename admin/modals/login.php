<?php
unset($_SESSION['email']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['profile']);
unset($_SESSION['phone']);
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = $_GET['state'];
    if ($state) {
        header("Location: ../user/activities.php");
    } else {

        $email_login = $_POST['email_login'];
        $password_login = $_POST['password_login'];

        $sql = "SELECT * FROM user_details WHERE EMAIL = :email_login AND PASSWORDS = :password_login LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email_login', $email_login);
        $stmt->bindParam(':password_login', $password_login);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $firstname = $row['FIRST_NAME'];
            $lastname = $row['LAST_NAME'];
            $email = $row['EMAIL'];
            $phone = $row['PHONE'];
            $_SESSION['phone'] = $row['PHONE'];
            $_SESSION['email'] = $row['EMAIL'];
            $_SESSION['firstname'] = $row['FIRST_NAME'];
            $_SESSION['lastname'] = $row['LAST_NAME'];
            if (isset($row['PROFILE'])) {
                var_dump($row['PROFILE']);
                $_SESSION['profile'] = $row['PROFILE'];
            }

            // $redirectUrl = "../../index.php?firstname=$firstname&lastname=$lastname&email=$email&phone=$phone";
            // $hashedUrl = hash('sha256', $redirectUrl);
            header("Location: ../../index.php");
        }
    }
}
