<?php

session_start(); // Start the session to access $_SESSION



require_once "database.php";
$id = $_GET['id'];

$book = getUpBook($id)[0];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="css/book-display.css" />
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
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

    <div class="back">
        <i class="bi bi-arrow-left" onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'"></i>
        <h1><b></b></h1>
    </div>
    <div class="bookdisplay">
        <div class="bookcontent">
            <div class="b-cover">
                <img src="<?= $book['image'] ?>" alt="">

            </div>
            <div class="ttl">
                <br>
                <h1><b><?= $book['title'] ?> </b><br></h1>
                <h3><? $book['name'] ?></>
            </div>

            <div class="sypnosis">
                <h5>Synopsis:</h5>
                <?php if ($book['sypnosis'] == null) { ?>
                    <p>There's no synopsis available for this book. You can visit the store by clicking the button below.</p>
                <?php } else { ?>
                    <p><?= $book['sypnosis'] ?></p>
                <?php } ?>
            </div>


            <div class="linkbtn">
                <a target="_blank" rel="noopener noreferrer" href="<?= $book['link'] ?>"><input type="button" value="Visit Store"></input></a>

            </div><br>
        </div>

    </div>
    <div><br><br></div>

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "(Read more)";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "(Read less)";
                moreText.style.display = "inline";
            }
        }
    </script>
</body>

</html>