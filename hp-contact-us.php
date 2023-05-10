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
            <h1><b>CONTACT US</b></h1>
        </div>
        <span><p>We're thrilled to hear from you! At our book recommendation mobile application, we value your feedback and suggestions. If you have any questions, concerns, or just want to say hi, please don't hesitate to get in touch with us.

<br><br>You can reach out to us via email at <a href="mailto:tsbookrecommendations2023@gmail.com">tsbookrecommendations2023@gmail.com.</a> We strive to respond to all inquiries within 24 hours.

<br><br>We also encourage you to connect with us on social media. Follow us on FACEBOOK, TWITTER, INSTAGRAM, to stay up-to-date with the latest news, updates, and book recommendations.

If you encounter any issues with our app or have any suggestions for improvement, please let us know. We're constantly working to make our app better, and your feedback plays a crucial role in that process.

<br><br>Thank you for using our book recommendation mobile application. We look forward to hearing from you soon!

<br><br><b>Treasure Shelf INSTAGRAM</b><br>

<b>Email:</b>
<br>tsbookrecommendations2023@gmail.com
<br><b>Username:</b>
<br>treasure.shelf2023
<br><b>Name:</b>
<br>Treasure Shelf
<br><b>Link:</b>
<br><a href="https://instagram.com/treasure.shelf2023?igshid=YmMyMTA2M2Y=">Instagram logo</a>





<br><br><b>Treasure Shelf FACEBOOK</b><br>

<b>Email:</b>
<br>tsbookrecommendations2023@gmail.com
<br><b>Name:</b>
<br>Trshlf Bkrec (Treasure Shelf Book Recommendations)
<br><b>link:</b>
<br><a href="https://www.facebook.com/treasure.shelf2023">Facebook logo</a>



<br><br><b>Treasure Shelf TWITTER</b><br>

<b>Username:</b>
<br>treasureshelf
<br><b>Link:</b>
<br><a href="https://twitter.com/TreasureShelf/">Twitter logo</a>
<p></span>




</body>

</html>