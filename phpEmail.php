<?php
    include "admin/config.php";
    $residence_name = $_GET['residence_name'];
    //CHECK FOR DUPLICATE
    $check = "SELECT EMAIL FROM booking_details WHERE EMAIL = :email";
    $stmt0 = $conn->prepare($check);
    $stmt0->bindParam(':email', $email);
    $checkAgain = $stmt0->execute();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($checkAgain)) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $occupants = $_POST['occupants'];
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $duration = $_POST['duration'];
        $email = $_POST['email'];

        $sql1 = "SELECT * FROM booking_details";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        
        if ($duration){

            $sql = "INSERT INTO booking_details (FIRST_NAME, LAST_NAME, EMAIL, CHECKIN_DATE, CHECKOUT_DATE, DURATION, RESIDENCE_BOOKED, OCCUPANTS_NO) VALUES(:firstname, :lastname, :email, :check_in_date, :check_out_date, :duration, :residence_booked, :occupants)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':check_in_date', $check_in_date);
            $stmt->bindParam(':check_out_date', $check_out_date);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':residence_booked', $residence_name);
            $stmt->bindParam(':occupants', $occupants);
            // $stmt->execute();
            if ($stmt->execute()){
                $_SESSION['booking_saved'] = "Booking saved successfully";
            }else{
                $_SESSION['booking_failed'] = "Booking failed";
            }
        } else {
            $sql = "INSERT INTO booking_details (FIRST_NAME, LAST_NAME, EMAIL, CHECKIN_DATE, CHECKOUT_DATE, RESIDENCE_BOOKED, OCCUPANTS_NO) VALUES(:firstname, :lastname, :email, :check_in_date, :check_out_date, :residence_booked, :occupants)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':check_in_date', $check_in_date);
            $stmt->bindParam(':check_out_date', $check_out_date);
            $stmt->bindParam(':residence_booked', $residence_name);
            $stmt->bindParam(':occupants', $occupants);
            // $stmt->execute();
            if ($stmt->execute()){
                $_SESSION['booking_saved'] = "Booking saved successfully";
            }else{
                $_SESSION['booking_failed'] = "Booking failed";
            }
        }
    }

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/autoload.php';
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
        $mail->addBCC('owusukojow21@gmail.com', "HBNB HOTEL ADMIN");

        $mail->isHTML(true);
        $subject = "HBNB Hotel Booking";
        $body = "Dear $firstname $lastname,<br>Thank you for booking at HBNB hotel.<br>You can proceed to check in at the specified time
        <br><br> BOOKING DETAILS
        <br>Residence booked: $residence_name
        <br>Check-in date: $check_in_date<br>Check-out date: $check_out_date<br>Number of occupant(s): $occupants<br>
        For enquiries, please email us at: owusukojow21@gmail.com <br>
        We can't wait to welcome you.<br>
        Best regards,<br>HBNB Hotel.";

        $non_html = "Dear $firstname $lastname,<br><br>Thank you for booking at HBNB hotel.<br>You can proceed to check in at the specified time
        <br><br> BOOKING DETAILS
        <br>Residence booked: $residence_name
        <br>Check-in date: $check_in_date<br>Check-out date: $check_out_date<br>Number of occupant(s): $occupants<br><br>
        For enquiries, please email us at: owusukojow21@gmail.com <br>
        We can't wait to welcome you.<br>
        Best regards,<br><br>HBNB Hotel.";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $non_html;

        $mail->send();
        header("Location: index.php");

    }catch(Exception $e){
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    
?> 