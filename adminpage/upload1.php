<?php 

include "modal_conn.php";

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mi = $_POST['mi'];
$email= $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

$sql = "INSERT INTO users (lname, fname, mi, email, password, user_type) VALUES ('$lname', '$fname', '$mi', '$email', '$password', '$user_type')";
if (mysqli_query($conn, $sql)) {
	echo '<script>alert("The book is succesfully added"); window.location.href = "admin-mnguser.php";</script>';
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
