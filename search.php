<?php
require_once "database.php";

// if (isset($_POST["search"])) {
//     $search = $_POST["search"];
//     $query = "SELECT  image, title FROM ( 
//         SELECT  image, title FROM books 
//         UNION 
//         SELECT image COLLATE utf8mb4_unicode_ci, title COLLATE utf8mb4_unicode_ci FROM national_books 
//         UNION 
//         SELECT image COLLATE utf8mb4_unicode_ci, title COLLATE utf8mb4_unicode_ci FROM local_books 
//     ) AS combined 
//     WHERE title LIKE '%$search%' 
//     LIMIT 4";


if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $query = "SELECT  image, title FROM ( 
        SELECT  image, title FROM books 
        UNION 
        SELECT image COLLATE utf8mb4_unicode_ci, title COLLATE utf8mb4_unicode_ci FROM collections
        
    ) AS combined 
    WHERE title LIKE '%$search%' 
    LIMIT 4";


    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($book = mysqli_fetch_assoc($result)) {

            echo "<div class='search-result '>";
            echo '<a href="search_display.php?id=' . $book['title'] . '">';
            echo "<div class='max-w-sm rounded overflow-hidden shadow-lg bg-transparent'>";
            echo "<img class='w-full' src='$book[image]' alt='Image description'>";
            echo "<div class='px-6 py-4'>";
            echo "<div class='font-bold text-xl mb-2 text-white'>$book[title]</div>";
            // echo "<p class='text-white text-base'>$book[name]</p>";

            echo "</div></div></a></div>";
        }
    } else {
        echo "<p>No results found</p>";
    }
}
