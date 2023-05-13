<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signin</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/Signinup.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>

<body>
    <div class="signup-box">
        <form action="#" method="post">
            <div class="login-box">
                <div class="signup">
                    <div class="npt">
                        <img src="images/ts-logo1.png">
                        <div>
                            <i class="bi bi-x-circle" onclick="document.getElementById('email').value = ''"></i>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </div>
                        <div>
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <input type="checkbox" value="lsRememberMe" id="rememberMe" style="margin-left:5px;"> <label for="rememberMe" style="font-size:16px">Remember me</label><br><br>
                        <input type="submit" name="submit" id="createbtn" value="LOGIN" onclick="lsRememberMe()">
                    </div>
                </div>
                <div>
                    <span>Don't have an account yet? <a href="signup.php">sign up</a></span><br><br>
                </div>


            </div>


            <?php
            session_start();
            include('connection.php');

            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['is_verified'] == 1) {
                        // User exists, store user data in session

                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_type'] = $row['user_type'];

                        // Check if user has taken the survey
                        $user_id = $row['id'];
                        $sql2 = "SELECT COUNT(*) AS count FROM user_pref WHERE user_id = $user_id";
                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_assoc();

                        if ($row2['count'] > 0) {
                            // User has taken the survey, redirect to homepage
                            header('Location: homepage.php?user_id=' . $row['id']);
                        } else {
                            // User has not taken the survey, redirect to survey page
                            header('Location: survey.php');
                        }
                    } else {
                        // User does not exist, display error message
                        echo '<div class="warning">The account are not verified</div>';
                    }
                } else {
                    echo '<div class="warning">Invalid username or password</div>';
                }
            }
            ?>```


        </form>
    </div>



    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") == "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        const rmCheck = document.getElementById("rememberMe"),
            emailInput = document.getElementById("email"),
            passwordInput = document.getElementById("password");

        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmCheck.setAttribute("checked", "checked");
            emailInput.value = localStorage.username;
            passwordInput.value = localStorage.password;
        } else {
            rmCheck.removeAttribute("checked");
            emailInput.value = "";
            passwordInput.value = "";

        }

        function lsRememberMe() {
            if (rmCheck.checked && emailInput.value !== "") {
                localStorage.username = emailInput.value;
                localStorage.password = passwordInput.value;
                localStorage.checkbox = rmCheck.value;
            } else {
                localStorage.username = "";
                localStorage.checkbox = "";
            }
        }



        // // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>

</body>

</html>