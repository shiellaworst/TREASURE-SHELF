<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header('Location: index.php');
    exit();
  }
  
// Database configuration

include('database.php');
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
        <div class="back1">
            <i class="bi bi-box-arrow-left" Onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'"></i>
            <h1><b>PRIVACY</b></h1>
        </div>
        <span><p>At Treasure Shelf: Book Recommendations, we take your privacy seriously. This Privacy Policy explains how we collect, use, and protect your personal information when you use our website. We only collect personal information that is necessary for us to provide our services to you, and we will never sell or share your information with third parties. We use various security measures to protect your information from unauthorized access and use. By using our website, you agree to the terms of this Privacy Policy.</p></span>


    </div>

</body>
</html>