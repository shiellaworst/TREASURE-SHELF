<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "books_dataset";

$connection = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}



function getRecommendedBooks()
{
  global $connection;
  $user_id = $_GET['user_id'];
  // Retrieve the user's preferred genres from the user_pref table
  $preferredGenres = array();
  $query = $connection->query("SELECT DISTINCT genre FROM user_pref WHERE user_id = $user_id");
  while ($row = $query->fetch_assoc()) {
    $preferredGenres[] = $row['genre'];
  }

  // Build a query to retrieve all books that match the user's preferred genres
  $query = "SELECT books.*, authors.id as author_id
            FROM books  
            JOIN books_genres ON books_genres.book_id = books.id 
            JOIN genres ON genres.id = books_genres.genre_id 
            JOIN authors ON books.author_id = authors.id  
            WHERE " . implode(" OR ", array_map(function ($genre) {
    return "genres.name_genre LIKE '%" . $genre . "%' ";
  }, $preferredGenres)) . "ORDER BY RAND() LIMIT 4";

  // Execute the query and return the result as an array of books
  $result = array();
  $queryResult = $connection->query($query);
  while ($row = $queryResult->fetch_assoc()) {
    $result[] = $row;
  }
  return $result;
}




//#REGION_GENRES

function getRecomCLick()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%adventure%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}
function getRecomCLick1()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%children%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick2()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%contemporary%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}
function getRecomCLick3()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%drama%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick4()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%fable%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick5()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%fantasy%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick6()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%fiction%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick7()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%history%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick8()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%horror%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick9()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%memoirs%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}


function getRecomCLick10()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%mythology%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick11()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%mystery%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick12()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%reality%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick13()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%novel%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick14()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%poetry%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}
function getRecomCLick15()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%romance%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick16()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%romantic comedy%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick17()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%science fictional%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}


function getRecomCLick18()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%self help%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

function getRecomCLick19()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%thriller%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}


function getRecomCLick20()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT books.*, authors.id as author_id
  FROM books  
  JOIN books_genres ON books_genres.book_id = books.id 
  JOIN genres ON books_genres.genre_id = genres.id 
  JOIN authors ON books.author_id = authors.id  
  WHERE genres.name_genre LIKE '%crime%'");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}

//END REGION-GENRES


function getRecomByGenre()
{
  global $connection;

  // $user = $_SESSION['user'];

  $query = $connection->query("SELECT * FROM books 
                                JOIN books_genres ON books.id = books_genres.book_id 
                                JOIN user_pref ON books.id = user_pref.book_id 
                                JOIN authors ON books.author_id = authors.id

                                WHERE user_pref.user_id = 1 AND user_pref.genre_id = 2");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
  }

  return $result;
}



// function getBooksData()
// {
//   global $connection;

//   $query = $connection->query("SELECT * FROM books JOIN authors ON authors.id = books.author_id");
//   $result = array();

//   while ($row = $query->fetch_assoc()) {
//     array_push($result, $row);
//   }

//   return $result;
// }


function getBooksData()
{
  global $connection;

  $query = $connection->query("SELECT * FROM collections  ORDER BY RAND() LIMIT 8");
  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}

function getUpPress()
{
  global $connection;

  $query = $connection->query("SELECT * FROM collections WHERE link LIKE '%press.up.edu%'  ORDER BY RAND() LIMIT 8");
  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}






function specificBook()
{

  global $connection;
  $id = $_GET['id'];

  $query = $connection->query("SELECT * FROM books 
  JOIN books_genres ON books.id = books_genres.book_id
  JOIN genres ON books_genres.genre_id = genres.id
  JOIN authors ON books.author_id = authors.id
  WHERE books.id = $id");
  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}


function seek()
{
  global $connection;
  $title = $_GET['id'];

  // Check if the book title is in the books table 
  $query = "SELECT * FROM books  
            JOIN books_genres ON books.id = books_genres.book_id  
            JOIN authors ON books.author_id = authors.id  
            WHERE title = '$title'";
  $result = $connection->query($query);

  if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
      array_push($rows, $row);
    }
    return $rows;
  }

  // If not, check if it's in the collections table 
  $query = "SELECT * FROM collections  
             
            WHERE title = '$title'";
  $result = $connection->query($query);


  if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
      array_push($rows, $row);
    }
    return $rows;
  }







  // If the book title is not found in either table, return an empty array 
  return array();
}
function getUpBook()
{

  global $connection;
  $id = $_GET['id'];

  $query = $connection->query("SELECT * FROM collections where id = $id ORDER BY RAND()");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}


function getUpBook1()
{

  global $connection;
  $id = $_GET['id'];

  $query = $connection->query("SELECT * FROM national_books where id = $id ORDER BY RAND()");

  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}




function importSurvey($user_id, $book_id, $author_id, $genre_id)
{

  global $connection;

  $user_id = $_POST['user_id'];
  $book_id = $_POST['book_id'];
  $author_id = $_POST['author_id'];
  $genre_id = $_POST['genre_id'];

  $query = $connection->query("INSERT INTO user_pref (user_id, book_id, author_id, genre_id) VALUES ('$user_id', '$book_id', '$author_id', '$genre_id')");
  $result = array();

  while ($row = $query->fetch_assoc()) {
    array_push($result, $row);
  }

  return $result;
}
