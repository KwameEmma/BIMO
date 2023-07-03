<?php
include "connection.php";
if(isset($_POST['submit'])){

    $fullname = htmlentities(filter_var($_POST['fullname']));
    $contact = htmlentities(filter_var($_POST['contact']));
    $dob = htmlentities(filter_var($_POST['dob']));
    $email = htmlentities(filter_var($_POST['email']));
    $password = htmlentities(addslashes($_POST['password']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "userimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO user_tbl(fullname,contact,dob,email,password,image)
            VALUES('$fullname','$contact','$dob','$email','$password','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,contact,password,image,)
        //     VALUES('$fullname','$contact','$password','$filename')");

            header("Location: components-badges.php");

        }else{
            echo "Sorry some error occured";
            header("Location: components-badges.php");
        }

}

?>
