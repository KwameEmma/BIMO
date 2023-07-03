<?php
// Include the connection.php file for establishing a database connection
include "connection.php";

// Check if the 'id' parameter is present in the GET request
if (isset($_GET['cid'])) {
    // Retrieve the value of the 'id' parameter
    $cid = $_GET['cid'];

    // Prepare delete query
    $stmt = $con->prepare("DELETE FROM courses_tbl WHERE cid = ?");

    // Bind the ID parameter to the query
    $stmt->bind_param("i", $cid);

    // Execute query
    if($stmt->execute()) {
        echo "<script>alert('Record deleted successfully.')</script>";
        header("Location: components-alerts.php");
        exit; // Add exit() to stop further execution after redirecting
    } else {
        echo "Error deleting record.";
        header("Location: components-alerts.php");
        exit; // Add exit() to stop further execution after redirecting
    }
    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($con);
?>

