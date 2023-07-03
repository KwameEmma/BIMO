<?php
    //Delete query
    // Establish a database connection
    include "connection.php";

   if(isset($_GET['vid'])){
    $vid = $_GET['vid']; // The ID of the record you want to delete

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM video_tbl WHERE vid = ?");
    $stmt->bind_param("i", $vid);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
        $status = "success";
        header("Location: components-carousel.php");
    } else {
        $message = "Error deleting record: " . $con->error;
        $status = "error";
        header("Location: components-carousel.php");
    }

    // Close the statement and database connection
    $stmt->close();
    mysqli_close($con);

    // Display toastr alert
    echo "<script>
            toastr.$status('$message');
        </script>";
   }
?>
