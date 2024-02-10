<?php
include "../../admin/config.php";
?>
    <?php
    //Retrieve form data
    $occupants_no = $_POST["occupantsnumber"];
    if ($occupants_no < 1 || $occupants_no > 5) {
        $_SESSION["occupantsnumberfail"] = "Invalid number of occupants";
        header("location: ../admin_page.php?page=book_room");
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // var_dump($_POST);
            // exit;
            $residence_name = $_POST['residencename'];
            $check_in_date = $_POST['check_in_date'];
            $check_out_date = $_POST['check_out_date'];
            $occupants_no = $_POST['occupantsnumber'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $name_parts = explode(" ", $fullname);
            $firstname = $name_parts[0];
            $lastname = $name_parts[1]; 
            $sql = "INSERT INTO booking_details_data (FIRST_NAME, LAST_NAME, EMAIL, CHECKIN_DATE, CHECKOUT_DATE, RESIDENCE_BOOKED,  OCCUPANTS_NO) VALUES (:firstname, :lastname, :email, :check_in_date, :check_out_date, :residence_name, :occupants_no)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':residence_name', $residence_name);
            $stmt->bindParam(':check_in_date', $check_in_date);
            $stmt->bindParam(':check_out_date', $check_out_date);
            $stmt->bindParam(':occupants_no', $occupants_no);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            if ($stmt->execute()) {
                echo "Booking saved successfully";
                $_SESSION["bookingsuccess"] = "Booking saved successfully";
                // header("location: ../admin_page.php?page=book_room");
            }
            
        }
    }

    if (isset($_GET['id'])) {
        $roomName = $_GET['id'];
        // var_dump($roomName); exit;
        // $sql = "UPDATE room SET ROOM_STATUS = NULL, ROOM_TYPE = NULL, AC_AVAILABILITY = NULL, OCCUPANTS_NO = NULL  WHERE RESIDENCE_NAME = '$roomName'";

        $sql = "DELETE FROM booking_details WHERE RESIDENCE_BOOKED = :roomName";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':roomName', $roomName);
        $stmt->execute();

        //temporary 
        $sql1 = "UPDATE room SET ROOM_STATUS = '1' WHERE NAME = :roomName";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':roomName', $roomName);
        $stmt->execute();
        $_SESSION["status"] = "BOOKED";
        header("location: ../admin_page.php?page=room_display&status=BOOKED");
    }
    // function generateCode($conn)
    // {
    //     $counter = retrieveCounter($conn);
    //     $formattedCounter = str_pad($counter, 3, '0', STR_PAD_LEFT);
    //     $generatedCode = 'RM' . $formattedCounter;
    //     // incrementCounter($conn);
    //     return $generatedCode;
    // }
    // function retrieveCounter($conn)
    // {
    //     $sql = "SELECT ROOM_CODE FROM room_details";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll();
    //     $counter = count($result) + 1;
    //     return $counter;
    // }
    ?>


    