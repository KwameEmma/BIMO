<?php
    //Delete query
    // Establish a database connection
    include "connection.php";

   if(isset($_GET['id'])){
    $id = $_GET['id']; // The ID of the record you want to delete

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM picture_tbl WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
        $status = "success";
        header("Location: components-cards.php");
    } else {
        $message = "Error deleting record: " . $con->error;
        $status = "error";
        header("Location: components-cards.php");
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
