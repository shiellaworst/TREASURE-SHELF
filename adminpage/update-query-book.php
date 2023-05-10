
<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "modal_conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";


	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];


	$id=$_GET['id'];
	$new_img_name=$_POST['book_cover'];
	$book_title=$_POST['book_title'];
	$genre=$_POST['genre'];
	$author=$_POST['author'];
	$description=$_POST['description'];

	$sql = "UPDATE `books` SET book_title='$book_title', genre='$genre', author='$author', description='$description' WHERE id='$id'";
				if ($conn->query($sql) == TRUE) {
                        echo '<script>alert("The book is succesfully updated"); window.location.href = "admin-mngbook.php";</script>';
                    } 


	if ($error === 0) {
		if ($img_size > 6000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: admin-mngbook.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `books` SET book_cover='$new_img_name', book_title='$book_title', genre='$genre', author='$author', description='$description' WHERE id='$id'";
				if ($conn->query($sql) == TRUE) {
					header("Location: admin-mngbook.php");
                    } 

			}else {
				$em = "You can't upload files of this type";
		        header("Location: admin-mngbook.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: admin-mngbook.php?error=$em");
	}
    

}

else {
	header("Location: admin-mngbook.php");
}
