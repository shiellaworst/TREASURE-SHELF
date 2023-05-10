<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "books_dataset";

    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


if ($_GET['id']){
    $user_id = $_GET['id'];
    $sql= "DELETE FROM users WHERE id='$user_id'";

    $result=mysqli_query($conn,$sql);

    if($result){
        header("location:admin-mnguser.php");
    }
}
