<?php
	require_once 'modal_conn.php';

	if(ISSET($_POST['update'])){
		$user_id = $_POST['id'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $user_type = $_POST['user_type'];
		$email = $_POST['email'];
		
		mysqli_query($conn, "UPDATE `users` SET `lname` = '$lname', `fname` = '$fname', `mi` = '$mi', `user_type` = '$user_type', `email` = '$email' WHERE `id` = '$user_id'");

		header("location: admin-mnguser.php");
	}
?>