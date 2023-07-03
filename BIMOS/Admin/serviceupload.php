<?php
include "connection.php";
if(isset($_POST['submit'])){

    $name = htmlentities(filter_var($_POST['name']));
    $description = htmlentities(filter_var($_POST['description']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "serviceimages/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO services_tbl(name,description,image)
            VALUES('$name','$description','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(name,description,password,image,)
        //     VALUES('$name','$description','$password','$filename')");

            header("Location: components-buttons.php");

        }else{
            echo "Sorry some error occured";
            header("Location: components-buttons.php");
        }

}

?>
