<?php
	include('modal_conn.php');
	$id=$_GET['id'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$mi=$_POST['mi'];
	$email=$_POST['email'];
	$user_type=$_POST['user_type'];
 
	mysqli_query($conn,"UPDATE `users` set lname='$lname', fname='$fname', mi='$mi', email='$email', user_type='$user_type' where id='$id'");
	header('location:admin-mnguser.php');
?>