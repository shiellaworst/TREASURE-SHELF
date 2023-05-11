<?php
$con=mysqli_connect("localhost","root","","books_dataset");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database');</script>";
    exit();
}

session_start();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';


    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tsbookrecommendations2023@gmail.com';                     //SMTP username
        $mail->Password   = 'htwcayxzuygvfcjb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    

        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
     
        //Recipients
        $mail->setFrom('tsbookrecommendations2023@gmail.com', 'Treasureshelf');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification from Treasureshelf';
        $mail->Body    = "Thanks for Registration!
        Click the link below to verify your email
        <a href='https://treasure-shelf.software/verify.php?email=$email&v_code=$v_code'>Verify Account</a>";

        $mail->send();
    return true;
} catch (Exception $e) {
    return false;}
}


if (isset($_POST['submit']))
{
    $user_exist_query="SELECT * FROM `users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            #if any user has already taken
           $result_fetch=mysqli_fetch_assoc($result);
           if($result_fetch['email']==$_POST['email'])
           {
            echo"
            <script>
            alert('$result_fetch[email]- Username already taken');
            window.location.href='signup.php';
            </script>";
           }    
        }
        else
        {
            $v_code=bin2hex(random_bytes(16));
            $query="INSERT INTO `users`(`lname`, `fname`, `mi`, `email`, `password`, `user_type`, `verification_code`, `is_verified`) VALUES ('$_POST[lname]','$_POST[fname]','$_POST[mi]','$_POST[email]','$_POST[password]','user','$v_code', '0')";

            if (mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
            {
                echo"
                <script>
                alert('Registration Succesful')
                window.location.href='index.php';
                </script>";
            }
        }
    }
    else
    {
        echo"
        <script>
        alert('Server Down')
        window.location.href='index.php';
        </script>";
    }



}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/signinup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    
</head>

<body>

    <div class="signup-box">
        <form action="#" method="POST">
        <div class="login-boxs">
            <div class="register">
                <div class="npt1">
                    <img src="images/ts-logo1.png">
                    
                    <div>
                        <i class="bi bi-x-circle" onclick="document.getElementById('lname').value = ''"></i>
                        <input name="lname" type="text" id="lname" placeholder="Last Name" required>
                    </div>
                    <div>
                        <i class="bi bi-x-circle" onclick="document.getElementById('fname').value = ''"></i>
                        <input name="fname" Type="text" id="fname" placeholder="First Name" required>
                    </div>
                    <div>
                        <i class="bi bi-x-circle" onclick="document.getElementById('mi').value = ''"></i>
                        <input name="mi" Type="text" id="mi" placeholder="Middle Initial" required>
                    </div>
                    
                    <div class="emailBox">
                        <div>
                            <i class="bi bi-x-circle" onclick="document.getElementById('email').value = ''"></i>
                            <input name="email" type="email" id="email" placeholder="Email" required>
                            <span class="emailText" id="color-span"></span>
                        </div>
                        <div class="passBox">
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            <input name="password" type="password" id="password" placeholder="Password" required>
                            <span class="passText" id="color-span1"></span>

                        </div>
                        <div>
                            <i class="bi bi-eye-slash" id="togglePassword1"></i>
                            <input name="password1" type="password" id="password1" placeholder="Re-Enter Password" required>
                            <span class="passText1" id="color-span2"></span>
                            <label></label>

                        </div>
                    </div>

                    <div>
                        <input type="submit" name="submit" id="createbtn" value="Create Account">
                    </div>
                    
                </div>
                
            </div>
            <span>Already have an account? <a href="index.php">Login Here</a> </span><br>
        </div>
        </form>
        

    </div>

    <script>
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const password1 = document.getElementById("password1");
        const colorSpan = document.getElementById("color-span");
        const colorSpan1 = document.getElementById("color-span1");
        const colorSpan2 = document.getElementById("color-span2");

        email.addEventListener('input', () => {
            const emailBox = document.querySelector('.emailBox');
            const emailText = document.querySelector('.emailText');
            const emailPattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;

            if (email.value.match(emailPattern)) {
                emailBox.classList.add('valid');
                emailBox.classList.remove('invalid');
                emailText.innerHTML = "Your Email Address is Valid";
                colorSpan.style.color = "green";
            } else {
                emailBox.classList.add('invalid');
                emailBox.classList.remove('valid');
                emailText.innerHTML = "Must be a valid email address.";
                colorSpan.style.color = "red";
            }
        });

        password.addEventListener('input', () => {
            const passBox = document.querySelector('.passBox');
            const passText = document.querySelector('.passText');
            const passPattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/;


            if (password.value.match(passPattern)) {
                passBox.classList.add('valid');
                passBox.classList.remove('invalid');
                passText.innerHTML = "Your Password is Valid";
                colorSpan1.style.color = "green";

            } else {
                passBox.classList.add('invalid');
                passBox.classList.remove('valid');
                passText.innerHTML = "Your password must be at least 8 characters as well as contain at least one uppercase, one lowercase, and one number.";
                colorSpan1.style.color = "red";

            }
        });

        password1.addEventListener('input', () => {
            const passText1 = document.querySelector('.passText1');


            if (password.value !== password1.value) {
                passText1.innerHTML = "Your password is not Match";
                colorSpan2.style.color = "red";
            } else if (password.value == password1.value) {
                passText1.innerHTML = "Your password is Match";
                colorSpan2.style.color = "green";
            } else {
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

        // // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });


        const togglePassword1 = document.querySelector("#togglePassword1");
        const pass1 = document.querySelector("#password1");

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = pass1.getAttribute("type") === "password" ? "text" : "password";
            pass1.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // // prevent form submit
        // const form1 = document.querySelector("form1");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>
</body>

</html>