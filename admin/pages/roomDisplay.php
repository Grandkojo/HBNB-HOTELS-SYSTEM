<?php
// $status = $_GET['status'];
// var_dump($status); exit;
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<style>
    .sticky-button {
        position: fixed;
        bottom: 460px;
        right: 20px;
        z-index: 100;
    }
</style>

<body>
<a href="#" onclick="goBack(); return false;">
            <i class="fa fa-arrow-left fa-2x me-3" aria-hidden="true" style="float:left;"></i>
        </a>
        <a href="#" onclick="goForward(); return false;">
            <i class="fa fa-arrow-right fa-2x me-3" aria-hidden="true" style="float:left;"></i>
        </a>
    <div class="container mt-3">
        <h2 class="text-center">ROOMS</h2>
    </div>
    <hr style="height:3px; border:0; background-color: blue;">
    <div class="d-flex justify-content-end me-3 mb-3">
        <!-- <a class="btn btn-lg btn-primary sticky-button <?php echo $page == "add_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_room&id=">Add Room</a> -->
    </div>
    <?php
    $sql = "SELECT * FROM booking_details_data WHERE STATUS = 'PENDING'";
    $display_query = $conn->prepare($sql);
    $display_query->execute();
    $result = $display_query->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result); exit;
    ?>

    <!-- <div class="table-responsive"> -->
    <div class="container">
        <div class="table-responsive">

            <table class="table table-borderless table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>CHECK-IN DATE</th>
                        <th>CHECK-OUT DATE</th>
                        <th>RESIDENCE BOOKED</th>
                        <th>OCCUPANTS NO</th>
                        <th>STATUS</th>
                        <th colspan="2" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $status = $_GET['status'];
                    $count = 1;
                    foreach ($result as $row) {
                        $sql1 = "SELECT CATEGORY, LOCATION, PRICE FROM room WHERE NAME = '" . $row["RESIDENCE_BOOKED"] . "'";
                        $display_query1 = $conn->prepare($sql1);
                        $display_query1->execute();
                        $result1 = $display_query1->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($result1); exit;
                        foreach ($result1 as $row1) {
                    ?>
                            <tr class="table-secondary">
                                <td class="text-start"><?php echo $count++; ?></td>
                                <td class="text-start"><?php echo $row["FIRST_NAME"]; ?></td>
                                <td class="text-start"><?php echo $row["LAST_NAME"]; ?></td>
                                <td class="text-start"><?php echo $row["EMAIL"]; ?></td>
                                <td class="text-start"><?php echo $row["CHECKIN_DATE"]; ?></td>
                                <td class="text-start"><?php echo $row["CHECKOUT_DATE"]; ?></td>
                                <td class="text-start"><?php echo $row["RESIDENCE_BOOKED"]; ?></td>
                                <td class="text-center"><?php echo $row["OCCUPANTS_NO"]; ?></td>
                                <td class="text-start"><button id="status" type="button" onclick="save('<?php echo $row['RESIDENCE_BOOKED'] ?>')" class="btn btn-sm btn-primary rounded-pill"><a class="nav-link"></a><?php echo $row["STATUS"]; ?></button></td>
                                <td><button type="button" class="btn btn-sm btn-success" data-bs-html="true" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Residence Specifics" data-bs-content="<?php echo '<strong>Room Type: </strong>' . " " . $row1['CATEGORY']  . ' <br> <strong>Location: </strong>' . " " . $row1['LOCATION'] . '<br><strong>Price: </strong>' . " " . $row1['PRICE']; ?>" data-bs-placement="bottom">Details</button></td>
                                <!-- <td class="text-start"><button class="btn btn-sm btn-primary"><a class="nav-link <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room&name=<?php echo urlencode($row["RESIDENCE_BOOKED"]); ?>"> Book</a></button></td> -->
                                <!-- <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=<?php echo $row["ROOM_NO"]; ?>">Delete</button></td> -->
                            </tr>
                    <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
    <!--<td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=</?php //echo $row["ROOM_NO"]; ?/>">Delete</button></td>
 -->

</body>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>
<script>
    function save(getId) {
        // Display a confirmation dialog using swal
        swal({
            title: "Current status: BOOKED",
            text: "Continue to reset status if the booking is due.",
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Continue",
            },
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                swal({
                    title: "Unbooked!",
                    text: "The room is now available for booking.",
                    icon: "success",
                    button: "Ok",
                }).then(() => {
                    // Redirect to the specified URL
                    window.location.href = "roomDetails/unbookingDetails.php?id="+getId;
                })
                // If the user confirms, redirect to the specified URL
            }
        });
    }
</script>
<!-- <script>
    function confirmDelete(roomId) {
        
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: {
                catch {
                    text: "Yes, delete it!",
                    result: "catch",
                },
                cancel: "Cancel",
            }
            // ["Yes, delete it!", "Cancel"],
            // showCancelButton: true,
            // confirmButtonColor: "#3085d6",
            // cancelButtonColor: "#d33",
            // confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            switch (result) {
                case ""
            }
            if (result.isConfirmed) {
                swal({
                    title: "Deleted!",
                    text: "Room deleted",
                    icon: "success",
                });
                
                // If the user confirms, redirect to the delete page with the room ID
                window.location.href = 'roomDetails/deleteRoomDetails.php?id=' + roomId;
            }
        });
    }
</script> -->
<script>
    function goBack() {
    window.history.back();
  }
  function goForward(){
    window.history.forward();
  }
</script>
</html>