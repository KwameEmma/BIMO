<?php
include "connection.php";
if(isset($_POST['submit'])){
   $name = htmlentities(addslashes($_POST['name']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];  

    $folder = "videos/";   

    if (move_uploaded_file($tmp_name, $folder.$filename)) {

        $query = "INSERT INTO video_tbl(name,video)
        VALUES('$name','$filename')";

        $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,email,password,image,)
        //     VALUES('$fullname','$email','$password','$filename')");

        header("Location: dashboard.php");

    }else{
        echo "Sorry some error occured";
        header("Location: index.html");
    }   

}

?>
