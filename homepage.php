<?php
require_once "database.php";
$booksHot = getBooksData();
$books = getRecommendedBooks();
$upPress = getUpPress();
session_start(); // Start the session to access $_SESSION

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header('Location: index.php');
    exit();
}
if (isset($_SESSION['user_id'])) { // Check if user_id is set in $_SESSION
    //  echo "User ID: " . $_SESSION['user_id']; // Output the user ID
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="css/homepage1.css" />
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="images/Web_Icon.png" type="image/png">


    <!-- tailwind -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Treasure Shelf</title>

</head>

<body>
    <div class="lol">
        <?php


        include('connection.php');

        // Get user data from database
        $user_id = $_SESSION['user_id']; // Get user ID from session
        $query = "SELECT * FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $fname = $row['fname'];
            $naem = explode(' ', trim($fname))[0];
        } else {

            echo "Error: " . mysqli_error($conn);
        }

        ?>
        <div class="mobile">
            <form action="#" method="POST">
                <!-- <div class="header">
                    <div class="user">
                        <a href="homepage.php"><img src="images/lg1.png" id="logo" alt="" /></a>
                        <input type="text" id="search" placeholder="search" onClick="location.href='search.php'" />
                        <button id="search-btn">search</button>
                        <div onclick="openPopup()">
                            <img src="images/user.png" id="user" type="submit">|
                            <span>
                               
                            </span>
                        </div>

                    </div>
                </div> -->


                <header class="bg-orange-50 fixed-top overflow-hidden">
                    <div class="container mx-auto flex justify-between items-center">
                        <div class="flex gap-2 items-center">
                            <!-- Logo -->
                            <a Onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'" class="flex items-center">
                                <img src="images/lg1.png" id="logo" alt="" class="max-w-50 "/>
                                <div class="text-sm"> Treasure Shelf: Book Recommendations</div>
                            </a>
                            

                            <!-- Name -->

                        </div>
                        
                        <div class="flex gap-2 items-center ">
                            
                            
                            <h1 class=" text-black text-lg font-medium"> <?php echo $naem; ?></h1>
                            <div class="image">
                            <div onclick="openPopup()">
                            <?php echo "<img src='uploads/".$row['user_img']."' >";?>
                            </div>
                        
                    </div>
                        </div>
                        <!-- Icon -->

                    </div>
                </header>


            </form>


            <div class="content">
                <h1 class="book-genres">BOOK GENRES</h1>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner" id="inner">
                        <div class="carousel-item active">
                            <p class="title">NOVEL</p>
                            <a href="bookshelf/shelf_novel.php">
                                <img src="images/Books_Cover/novel.jpg" class="imagemoving" alt="..."> </a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">FABLE</p>
                            <a href="bookshelf/shelf_fable.php">
                                <img src="images/Books_Cover/fable.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">HORROR</p>
                            <a href="bookshelf/shelf_horror.php">
                                <img src="images/Books_Cover/horror.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">DRAMA</p>
                            <a href="bookshelf/shelf_drama.php">
                                <img src="images/Books_Cover/drama.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">CHILDREN LITERATURE</p>
                            <a href="bookshelf/shelf_childlit.php">
                                <img src="images/Books_Cover/children lit.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">FANTASY</p>
                            <a href="bookshelf/shelf_fantasy.php">
                                <img src="images/Books_Cover/fantasy.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">ADVENTURE</p>
                            <a href="bookshelf/shelf_adventure.php">
                                <img src="images/Books_Cover/adventure.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">CONTEMPORARY</p>
                            <a href="bookshelf/shelf_contemp.php">
                                <img src="images/Books_Cover/contemporary.png" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">FICTION</p>
                            <a href="bookshelf/shelf_fiction.php">
                                <img src="images/Books_Cover/fiction.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">MEMOIRS</p>
                            <a href="bookshelf/shelf_memoirs.php">
                                <img src="images/Books_Cover/memoirs.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">HISTORY</p>
                            <a href="bookshelf/shelf_history.php">
                                <img src="images/Books_Cover/history.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">MYSTERY</p>
                            <a href="bookshelf/shelf_mystery.php">
                                <img src="images/Books_Cover/mystery.png" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">MYTHOLOGY</p>
                            <a href="bookshelf/shelf_methology.php">
                                <img src="images/Books_Cover/mythology.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">NON-FICTION</p>
                            <a href="bookshelf/shelf_non-fic.php">
                                <img src="images/Books_Cover/non-fiction.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">ROMANCE</p>
                            <a href="bookshelf/shelf_romance.php">
                                <img src="images/Books_Cover/romance.png" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">POETRY</p>
                            <a href="bookshelf/shelf_poetry.php">
                                <img src="images/Books_Cover/poetry.png" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">SCI-FI</p>
                            <a href="bookshelf/shelf_sci fi.php">
                                <img src="images/Books_Cover/Sci-fi.png" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">THRILLERS</p>
                            <a href="bookshelf/shelf_thrillers.php">
                                <img src="images/Books_Cover/thrillers.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">TRUE CRIME</p>
                            <a href="bookshelf/shelf_truecrime.php">
                                <img src="images/Books_Cover/true_crime.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">ROM-COM</p>
                            <a href="bookshelf/shelf_romcom.php">
                                <img src="images/Books_Cover/romcom.jpg" class="imagemoving" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <p class="title">SELF HELP</p>
                            <a href="bookshelf/shelf_selfhelp.php">
                                <img src="images/Books_Cover/self_help.jpg" class="imagemoving" alt="..."></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" id="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">""</span>
                    </button>
                    <button class="carousel-control-next" id="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">""</span>
                    </button>
                </div>
            </div>
        </div>




        <!-- #region Recommendation -->

        <div class="md:px-0 px-2 max-w-screen-lg mx-auto py-9">

            <div class="relative mb-5 ">
                <div class="search-container flex border border-black rounded">
                    <input type="text" placeholder="Search your book here..." class="w-full bg-transparent p-2">
                    <div class="flex items-center px-2">
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M22 22L15.5 15.5M16 10.5C16 14.0899 13.0899 17 9.5 17C5.91015 17 3 14.0899 3 10.5C3 6.91015 5.91015 4 9.5 4C13.0899 4 16 6.91015 16 10.5Z"></path>
                        </svg>
                    </div>
                </div>



                <div class="search-results mt-7 grid grid-cols-2 md:grid-cols-4 gap-3"></div>
            </div>
            <div class="font-bold text-2xl  ">Books that you may like</div>
            <div class="font-bold text-sm mb-4 text-slate-500">Recommendations according to your like genres</div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <?php foreach ($books as $book) : ?>
                    <a href="book-display.php?id=<?= $book['id'] ?>">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-transparent  h-100">
                            <img class="w-full" src="<?= $book['image'] ?>" alt="Image description">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-black "><?= $book['title'] ?></div>
                                <!-- <p class="text-base text-slate-600"><?= $book['name'] ?></p> -->
                            </div>
                        </div>
                    </a>


                <?php endforeach; ?>
            </div>



            <div class="font-bold text-2xl mb-4 mt-5 ">Our hot picks for you</div>
            <div class="font-bold text-sm mb-4 text-slate-500">Locally availble books</div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <?php foreach ($booksHot as $bookH) : ?>
                    <a href="local_books_display.php?id=<?= $bookH['id'] ?>">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-transparent  h-100">
                            <img class="w-full" src="<?= $bookH['image'] ?>" alt="Image description">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-black "><?= $bookH['title'] ?></div>
                                <!-- <p class="text-base text-slate-600"><?= $bookH['name'] ?></p> -->
                            </div>
                        </div>
                    </a>


                <?php endforeach; ?>
            </div>





            <div class="font-bold text-2xl mt-5 ">Educational Books</div>
            <div class="font-bold text-sm mb-4 text-slate-500">UP PRESS ONLINE STORE</div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <?php foreach ($upPress as $booksUP) : ?>
                    <a href="local_books_display.php?id=<?= $booksUP['id'] ?>">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-transparent  h-100">
                            <img class="w-full" src="<?= $booksUP['image'] ?>" alt="Image description">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-black "><?= $booksUP['title'] ?></div>
                                <p class="text-base text-slate-600"><?= $booksUP['author'] ?></p>
                            </div>
                        </div>
                    </a>


                <?php endforeach; ?>
            </div>




            <!-- #End region 

            

    </div> -->


            <div class="container1">
                <div class="popup" id="popup">
                    <div class="user-menu">
                        <a Onclick="window.location.href='homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'"><i class="bi bi-house"></i>Home</a>
                        <a href="hp-user-profile.php" onclick="closePopup()"><i class="bi bi-person-gear"></i>Profile</a>
                        <a href="hp-mng-pass.php" onclick="closePopup()"><i class="bi bi-person-lock"></i>Manage Password</a>
                        <a href="hp-privacy.php" onclick="closePopup()"><i class="bi bi-shield-check"></i>Privacy</a>
                        <a href="hp-contact-us.php" onclick="closePopup()"><i class="bi bi-telephone-inbound"></i>Contact Us</a>
                        <a href="hp-about-us.php" onclick="closePopup()"><i class="bi bi-info-circle"></i>About Us</a><br>
                        <?php
                        echo "<a onClick =\"javascript:return confirm('Are you sure to sign out?');\" 
            href='logout.php'><i class='bi bi-box-arrow-in-left'></i>Log out </a>";
                        ?>
                    </div>
                    <button type="button" onclick="closePopup()">Back</button>
                </div>
            </div>

            <script src="js/script.js"> </script>

        </div>


</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".search-container input").keyup(function() {
            var searchText = $(this).val();
            if (searchText != "") {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        search: searchText
                    },
                    success: function(response) {
                        $(".search-results").html(response);
                    }
                });
            } else {
                $(".search-results").html("");
            }
        });
    });
</script>

</html>