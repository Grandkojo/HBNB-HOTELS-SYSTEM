<?php

    $sql = "SELECT * FROM room";
    $reesult = $conn->prepare($sql);
    $reesult->execute();
    $rows = $reesult->fetchAll();
    $count = $reesult->rowCount();

    $sql1 = "SELECT * FROM room_details";
    $reesult1 = $conn->prepare($sql1);
    $reesult1->execute();
    $rows1 = $reesult1->fetchAll();
    $count1 = $reesult1->rowCount();

    $sql2 = "SELECT * FROM booking_details";
    $reesult2 = $conn->prepare($sql2);
    $reesult2->execute();
    $rows2 = $reesult2->fetchAll();
    // var_dump($rows2); exit;
    $count2 = $reesult2->rowCount();

?>