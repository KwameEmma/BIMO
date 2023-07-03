<?php
    //Delete query
    // Establish a database connection
    include "connection.php";

   if(isset($_GET['sid'])){
    $sid = $_GET['sid']; // The ID of the record you want to delete

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM student_tbl WHERE sid = ?");
    $stmt->bind_param("i", $sid);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
        $status = "success";
        header("Location: components-badges.php");
    } else {
        $message = "Error deleting record: " . $con->error;
        $status = "error";
        header("Location: components-badges.php");
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
