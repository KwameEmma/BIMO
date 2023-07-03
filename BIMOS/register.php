<?php
include "connection.php";
if(isset($_POST['submit'])){

    $fullname = htmlentities(filter_var($_POST['fullname']));
    $contact = htmlentities(filter_var($_POST['contact']));
    $gender = htmlentities(filter_var($_POST['gender']));
    $course = htmlentities(filter_var($_POST['course']));
    $location = htmlentities(filter_var($_POST['location']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];  

        $folder = "studentimage/";   

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO student_tbl(fullname,contact,gender,course,location,image)
            VALUES('$fullname','$contact','$gender','$course','$location','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,contact,gender,image,)
        //     VALUES('$fullname','$contact','$gender','$filename')");

            header("Location: index.php");

        }else{
            echo "Sorry some error occured";
            // header("Location: index.html");
        }   
    
}

?>