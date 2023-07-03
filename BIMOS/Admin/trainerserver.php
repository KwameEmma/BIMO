<?php
include "connection.php";
if(isset($_POST['submit'])){

    $t_name = htmlentities(filter_var($_POST['t_name']));
    $t_contact = htmlentities(filter_var($_POST['t_contact']));
    $t_email = htmlentities(filter_var($_POST['t_email']));
    $t_address = htmlentities(filter_var($_POST['t_address']));
    $t_course = htmlentities(addslashes($_POST['t_course']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "trainersimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO trainner_tbl(t_name,t_contact,t_email,t_address,t_course,image)
            VALUES('$t_name','$t_contact','$t_email','$t_address','$t_course','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(t_name,t_contact,password,image,)
        //     VALUES('$t_name','$t_contact','$password','$filename')");

            header("Location: components-accordion.php");

        }else{
            echo "Sorry some error occured";
            header("Location: components-accordion.php");
        }

}

?>
