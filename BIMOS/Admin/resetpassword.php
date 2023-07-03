<?php
include "connection.php";

if (isset($_POST['submit'])) {
    // Retrieve the data sent via POST request
    $newPassword = $_POST['newpassword'];
    $renewPassword = $_POST['renewpassword'];

    // Retrieve the admin ID ($aid) based on your application logic
    $result = mysqli_query($con, "SELECT * FROM admin_tbl WHERE aid = '{$aid}'");
    $row = mysqli_fetch_assoc($result);
    $row['aid'] = $aid; // Replace with your logic

    // Example: Check if the passwords match
    if ($newPassword === $renewPassword) {
        // Prepare and execute the SQL query to update the admin's password using prepared statements
        $sql = "UPDATE admin_tbl SET password = ? WHERE aid = ?";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "si", $newPassword, $aid);

        if (mysqli_stmt_execute($stmt)) {
            // Return a success response
            http_response_code(200);
            echo "Password reset successful";
        } else {
            // Return an error response
            http_response_code(400);
            echo "Error: Failed to reset the password. " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Passwords do not match, send an error response
        echo "Passwords do not match";
    }
}

// Close the database connection
mysqli_close($con);

?>

