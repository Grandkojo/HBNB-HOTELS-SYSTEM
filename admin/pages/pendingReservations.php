<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>



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
            <i class="fa fa-arrow-left fa-2x me-3" aria-hidden="true" style="float:left; margin-left: 20px;"></i>
        </a>
        <a href="#" onclick="goForward(); return false;">
            <i class="fa fa-arrow-right fa-2x me-3" aria-hidden="true" style="float:left; "></i>
        </a>
    <div class="container mt-3">
        <h2 class="text-center">ROOMS</h2>
    </div>
    <hr style="height:3px; border:0; background-color: blue;">
    <div class="d-flex justify-content-end me-3 mb-3">
    </div>
    <?php
    $sql = "SELECT * FROM booking_details";
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
                    <th colspan="3" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($result as $row) {
                  // var_dump($row); exit;
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
                        <td class="text-start"><?php echo $row["OCCUPANTS_NO"]; ?></td>
                        <td class="text-start"><button class="btn btn-sm btn-primary"><a class="nav-link <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room&name=<?php echo urlencode($row["RESIDENCE_BOOKED"]); ?>"> Book</a></button></td>
                        <td><button type="button" class="btn btn-sm btn-success" data-bs-html="true" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Residence Specifics" data-bs-content="<?php echo '<strong>Room Type: </strong>' . " " . $row1['CATEGORY']  . ' <br> <strong>Location: </strong>' . " " . $row1['LOCATION'] . '<br><strong>Price: </strong>' . " " . $row1['PRICE']; ?>" data-bs-placement="bottom">Details</button></td>
                        <td class="text-start"><button id="delete" class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=<?php echo $row["RESIDENCE_BOOKED"]; ?>">Delete</button></td>
                    </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>

</body>
<script>
document.getElementById("delete").addEventListener("click", function(event) {
  event.preventDefault(); // Prevent the default click behavior

  // Display a confirmation dialog using swal
  swal({
    title: "Are you sure?",
    text: "This action cannot be undone.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((confirmed) => {
    if (confirmed) {
      swal({
        title: "Deleted!",
        text: "The booking has been deleted.",
        icon: "success",
        button: "Ok",
      }).then(() => {
        // Redirect to the specified URL
        window.location.href = event.target.href;
      })
      // If the user confirms, redirect to the specified URL
    }
  });
});
</script>
<!-- <script>
    let deleteButton = document.getElementById('delete');
    deleteButton.addEventListener('click', () => {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
    })
</script> -->
<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>
<script>
  function goBack() {
    window.history.back();
  }
  function goForward(){
    window.history.forward();
  }
</script>
</html>