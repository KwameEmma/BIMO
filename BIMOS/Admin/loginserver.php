<?php
session_start();
include "connection.php";

$email = htmlentities(addslashes($_POST['email']));
$password = htmlentities(addslashes($_POST['password']));

$result = mysqli_query($con, "SELECT * FROM admin_tbl WHERE email = '{$email}' AND password = '{$password}'");

$num = mysqli_num_rows($result);
if($num > 0){
    $row = mysqli_fetch_row($result);
    $_SESSION['email'] = $email; // set the email address to the session variable
    // echo "Successfull";
    Header("Location: dashboard.php");

}else{
    echo "Wrong user credentials";
    Header(" index.html");
}

?>