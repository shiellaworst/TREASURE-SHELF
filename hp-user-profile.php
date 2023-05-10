<?php

// Start session
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header('Location: index.php');
    exit();
  }
  
// Database configuration

include('database.php');

// Get user data from database
$user_id = $_SESSION['user_id']; // Get user ID from session
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($connection, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $lname = $row['lname'];
  $fname = $row['fname'];
  $mi = $row['mi'];
  $email = $row['email'];
  $mi = $row['mi'];
  $password = $row['password'];
} else {
  
  echo "Error: " . mysqli_error($connection);
}



if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mi = $_POST['mi'];
    $email = $_POST['email'];
    // $password = $_POST['password'];

    // Check if the password and confirm password fields match
    // if ($password != $password1) {
    //     echo "Passwords do not match";
    // } else {
    //     // Hash the password before storing it in the database
    //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET lname='$lname', fname='$fname', mi='$mi', email='$email' WHERE id=$user_id";

        if (mysqli_query($connection, $sql)) {
            echo '<script>alert("Updated Succesfully"); window.location.href = "hp-user-profile.php";</script>';
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="css/user-profile.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="images/Web_Icon.png" type="image/png">
    <title>TS | User-Profile</title>

</head>
<body>
    <?php
        include "loading.php";
    ?>
    <div class ="user-profile">
        <div class="back">
            <i class="bi bi-box-arrow-left" Onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'"></i>
            <h1><b>PROFILE</b></h1>
        </div>
        <div class="user-icon">
            <img src="images/user.png">
        </div>
        <div class="add"><i class="bi bi-camera"></i></div>



        <div class="info">
            <h5><b>Personal Information</b></h5>
            <form action="#" method="POST">
                <h6>Last Name</h6>
                <input type="text" name="lname" value="<?php echo $lname; ?>">
                <h6>First Name</h6> 
                <input type="text" name="fname" value="<?php echo $fname; ?>">
                <h6>MI.</h6>
                <input type="text" name="mi" value="<?php echo $mi; ?>">
                <div style="pointer-events: none;">
                <h6>Email Address</h6>
                <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
                </div>
                


        
                <div class="submit-btn">
                    <input type="submit" name="submit" value="Update">
                </div><br><br>


    

                
            </form>
        </div>
        
            
    </div>

  <script>
    
    const password = document.getElementById("password");
        const password1 = document.getElementById("password1");
        const colorSpan = document.getElementById("color-span");
        const colorSpan1 = document.getElementById("color-span1");
        const colorSpan2 = document.getElementById("color-span2");


        password.addEventListener('input',()=>{
			const passBox = document.querySelector('.passBox');
			const passText = document.querySelector('.passText');
			const passPattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/;
            

			if(password.value.match(passPattern)){
				passBox.classList.add('valid');
				passBox.classList.remove('invalid');
				passText.innerHTML = "Your Password is Valid";
                colorSpan1.style.color = "green";
                 
			}else{
				passBox.classList.add('invalid');
				passBox.classList.remove('valid');
				passText.innerHTML = "Your password must be at least 8 characters as well as contain at least one uppercase, one lowercase, and one number."; 
                colorSpan1.style.color = "red";

			}
		});
        
        password1.addEventListener('input',()=>{
            const passText1 = document.querySelector('.passText1');
            

            if (password.value !== password1.value) {
                passText1.innerHTML = "Your password is not Match"; 
                colorSpan2.style.color = "red";
            } else if (password.value == password1.value){
                passText1.innerHTML = "Your password is Match"; 
                colorSpan2.style.color = "green";
            }else{
                passText1.innerHTML = "";
            }

        });


        const togglePassword = document.querySelector("#togglePassword");
        const pass = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = pass.getAttribute("type") === "password" ? "text" : "password";
            pass.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        const togglePassword1 = document.querySelector("#togglePassword1");
        const pass1 = document.querySelector("#password1");

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = pass1.getAttribute("type") === "password" ? "text" : "password";
            pass1.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

  </script>


</body>
</html>