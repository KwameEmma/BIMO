<?php
    //Delete query
    // Establish a database connection
    include "connection.php";

   if(isset($_GET['t_id'])){
    $t_id = $_GET['t_id']; // The ID of the record you want to delete

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM trainner_tbl WHERE t_id = ?");
    $stmt->bind_param("i", $t_id);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
        $status = "success";
        header("Location: components-accordion.php");
    } else {
        $message = "Error deleting record: " . $con->error;
        $status = "error";
        header("Location: components-accordion.php");
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
