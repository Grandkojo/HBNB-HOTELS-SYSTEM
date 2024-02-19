<?php
// Sends an email to the account that requested it to reset their password
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email_login"]) && !empty($_POST["email_login"])) {
        $email = $_POST["email_login"];
        $sql = "SELECT PASSWORDS FROM user_details WHERE email = :email";
        $result = $conn->prepare($sql);
        $result->bindParam(':email', $email);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $password = $row['PASSWORDS'];
        
    }
}

require '../../PHPMailer-master/src/Exception.php';
    require '../../PHPMailer-master/src/PHPMailer.php';
    require '../../PHPMailer-master/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../../vendor/autoload.php';
    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'essienernest.kojoowusu@gmail.com';
        $mail->Password = 'zgra iyns forz abkp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('essienernest.kojoowusu@gmail.com', "HBNB HOTEL");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $subject = "HBNB Hotel Password Recovery";
        $body = "Dear HBNBer,<br>Please discard this email if you didn't request an email recovery.<br>Your email recovery password is <a href='#'>$password</a>.<br>
        Best regards,<br>HBNB Hotel.";

        $non_html = "Dear HBNBer,<br>Please discard this email if you didn't request an email recovery.<br>Your email recovery password is <a href='#'>$password</a>.<br>
        Best regards,<br>HBNB Hotel.";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $non_html;

        $mail->send();
        // echo "Message has been sent successfully";
        header("Location: ../../index.php");

    }catch(Exception $e){
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>


