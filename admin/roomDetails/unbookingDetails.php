<?php
    include "../config.php";
    $id = $_GET['id'];
    $sql = "UPDATE room SET ROOM_STATUS = 1 WHERE NAME = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql1 = "UPDATE booking_details_data SET STATUS = 'DUE' WHERE RESIDENCE_BOOKED = :id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();
    if ($stmt1->execute()){
        header("Location: ../admin_page.php?page=room_display");
    }
?>