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
        <div class="back">
            <i class="bi bi-box-arrow-left" Onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'"></i>
            <h1><b>ABOUT US</b></h1>
        </div>
        <span><p>Welcome to Treasure Shelf: Book Recommendations ! We are a team of passionate readers and tech enthusiasts who have come together to create a platform that connects book lovers with their next great read.

Our mission is to make the process of discovering new books fun, easy, and personalized. We understand that every reader has their own unique tastes and preferences, and our app is designed to cater to those individual needs.

With a vast collection of books spanning across different genres and categories, we strive to provide our users with a curated selection of titles that will pique their interest and keep them engaged. Our app features a sophisticated recommendation engine that uses machine learning algorithms to suggest books based on your reading history and preferences.

At our core, we believe that reading is a transformative experience that can broaden our horizons, challenge our assumptions, and inspire us to be better. We want to create a community of book lovers who can share their thoughts, opinions, and recommendations with each other.

We are committed to creating a seamless and user-friendly experience for our users. Whether you're looking for your next page-turner or want to explore a new genre, we've got you covered. Join us on this exciting journey and let's discover the world of books together!
</p></span>


</body>
</html>