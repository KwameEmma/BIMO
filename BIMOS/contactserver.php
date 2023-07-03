<?php
include "connection.php";

if(isset($_POST['submit'])){
    $name = htmlentities(addslashes($_POST['name']));
    $email = htmlentities(addslashes($_POST['email']));
    $subject = htmlentities(addslashes($_POST['subject']));
    $message = htmlentities(addslashes($_POST['message']));

   $sql = "INSERT INTO message_tbl(name,email,subject,message)
   VALUES('$name','$email','$subject','$message')";

    $result = mysqli_query($con, $sql);

   header("Location: contact.html");
}else{
    echo "Error";
    header("Location: contact.html");
}
?> 