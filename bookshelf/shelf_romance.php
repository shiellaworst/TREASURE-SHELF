<?php
require_once "../database.php";
$books = getRecomCLick15();

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="../css/shelf.css" />
    <link rel="stylesheet" type="text/css" href="../css/loading.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
    
    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="../images/Web_Icon.png" type="image/png">
    <title>Treasure Shelf</title>
</head>
<body>
    <div class="genre">
        <div class="upper" onclick="window.location.href='../homepage.php?user_id=<?php echo $_SESSION['user_id']; ?>'">
            <h2>ROMANCE</h2>
            <div class="back"><br>
                <i class="bi bi-arrow-left" ></i>
            </div>
        </div>


    
        <?php
        include "loading.php"
        ?>

        <div class="bookshelf">
            <div class="container">
                <div class="shelf-list">
                    <?php
                                        // Display the first book
                        $book = $books[0];
                        echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                        echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                        echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                        echo "<div class='px-6 py-4'>";

                        echo "</div></div></a>";
                        
                    ?>
                    <?php
                                        // Display the first book
                        $book = $books[20];
                        echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                        echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                        echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                        echo "<div class='px-6 py-4'>";

                        echo "</div></div></a>";
                        
                    ?>
                    <?php
                                        // Display the first book
                        $book = $books[2];
                        echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                        echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                        echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                        echo "<div class='px-6 py-4'>";
                        echo "</div></div></a>";
                    ?>
                    </div>
                
                    </div>
                </div>
            </div>      
        </div>
        <div class="bookshelf">
        <div class="container">
            <div class="shelf-list">
                <?php
                                    // Display the first book
                    $book = $books[25];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";

                    echo "</div></div></a>";
                    
                ?>
                <?php
                                    // Display the first book
                    $book = $books[4];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";

                    echo "</div></div></a>";
                    
                ?>
                <?php
                                    // Display the first book
                    $book = $books[5];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";
                    echo "</div></div></a>";
                ?>
            </div>
        </div>
        </div>
        
        <div class="bookshelf">
        <div class="container">
            <div class="shelf-list">
                <?php
                                    // Display the first book
                    $book = $books[6];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";

                    echo "</div></div></a>";
                    
                ?>
                <?php
                                    // Display the first book
                    $book = $books[31];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";

                    echo "</div></div></a>";
                    
                ?>
                <?php
                                    // Display the first book
                    $book = $books[8];
                    echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                    echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                    echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                    echo "<div class='px-6 py-4'>";
                    echo "</div></div></a>";
                ?>
            </div>
        </div>
        </div>

        

        <div class="bookshelf">
        <div class="container">
            <div class="shelf-list">
            <?php
                                // Display the first book
                $book = $books[9];
                echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                echo "<div class='px-6 py-4'>";

                echo "</div></div></a>";
                
            ?>
            <?php
                                // Display the first book
                $book = $books[10];
                echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                echo "<div class='px-6 py-4'>";

                echo "</div></div></a>";
                
            ?>
            <?php
                                // Display the first book
                $book = $books[11];
                echo '<a href="../book-display.php?id=' . $book['id'] . '">';
                echo "<div class='max-w-sm rounded overflow-hidden shadow-lg'>";
                echo "<img class='w-full' src='" . $book['image'] . "' alt='Image description'>";
                echo "<div class='px-6 py-4'>";
                echo "</div></div></a>";
            ?>

            </div>
        </div>
        </div>
        
    </div>
      
    <script src="../js/script.js">
    </script>
</body>
</html>