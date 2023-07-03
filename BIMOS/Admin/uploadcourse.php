<?php
include "connection.php";
if(isset($_POST['submit'])){
    $courses_name = htmlentities(addslashes($_POST['courses_name']));
    $courses_duration = htmlentities(addslashes($_POST['courses_duration']));
    $courses_price = htmlentities(addslashes($_POST['courses_price']));
    $student_id = htmlentities(addslashes($_POST['student_id']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];  

    $folder = "courseimage/";   

    if (move_uploaded_file($tmp_name, $folder.$filename)) {

        $query = "INSERT INTO courses_tbl(courses_name,courses_duration,courses_price,student_id,image)
        VALUES('$courses_name',' $courses_duration','$courses_price','$student_id','$filename')";

        $result = mysqli_query($con, $query);

        header("Location: components-alerts.php");

    }else{
        echo "Sorry some error occured";
        header("Location: components-alerts.php");
    }   

}

?>
