<?php
session_start();

// Check if the user ID session variable is set
if (isset($_SESSION['user_id'])) {
  // Display the user ID to the user
  // echo "Your user ID is: " . $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!---<title> Responsive Registration Form | CodingLab </title>--->
  <link rel="stylesheet" href="css/survey.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



  <div class="container">
    <div class="title">Treasure Shelf: Book Recommendation Survey</div>
    <div class="content">
      <form method="POST" action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">What is your Favorite Book of all time?</span>
            <input type="text" name="fave_book" placeholder="Enter your Favorite Book" required>
          </div>
          <div class="input-box">
            <span class="details">Who is your Favorite Author of all time?</span>
            <input type="text" name="fave_author" placeholder="Enter your Favorite Author" required>
          </div>
          <div class="input-box">
            <span class="details">What are your favorite genre of books?</span>
            <div>
              <div>
                <input type="checkbox" name="genre[]" value="Adventure">
                <label for="adventure">Adventure</label>
              </div>
              <div>
                <input type="checkbox" name="genre[]" value="Children Literature">
                <label for="child-lit">Children Literature</label>
              </div>
              <div>
                <input type="checkbox" id="genre-drama" name="genre[]" value="Contemporary">
                <label for="contemporary">Contemporary</label>
              </div>
              <div>
                <div>
                  <input type="checkbox" name="genre[]" value="Drama">
                  <label for="drama">Drama</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Fable">
                  <label for="fable">Fable</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Fantasy">
                  <label for="fantasy">Fantasy</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Fiction">
                  <label for="fiction">Fiction</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="History">
                  <label for="history">History</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Horror">
                  <label for="horror">Horror</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Memoirs">
                  <label for="memoirs">Memoirs</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Mythology">
                  <label for="mythology">Mythology</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Mystery">
                  <label for="mystery">Mystery</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Non-Fiction">
                  <label for="non-fiction">Non-Fiction</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Novel">
                  <label for="novel">Novel</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Poetry">
                  <label for="poetry">Poetry</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Romance">
                  <label for="romance">Romance</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Rom-Com">
                  <label for="rom-com">Rom-Com</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Sci-Fi">
                  <label for="sci-fi">Sci-Fi</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Self Help">
                  <label for="self-help">Self Help</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Thrillers">
                  <label for="thrillers">Thrillers</label>
                </div>
                <div>
                  <input type="checkbox" name="genre[]" value="Truecrime">
                  <label for="truecrime">Truecrime</label>
                </div>
              </div>
              <br>


              <div class="input-box">
                <span class="details">What is your preferred format for reading books?</span>
                <div>
                  <div>
                    <input type="checkbox" name="book_format[]" value="physical book">
                    <label for="phy-book">Physical Book</label>
                  </div>
                  <div>
                    <input type="checkbox" name="book_format[]" value="e-book">
                    <label for="e-book">E-Book</label>
                  </div>
                  <div>
                    <input type="checkbox" name="book_format[]" value="Audiobook">
                    <label for="Audiobook">Audiobook</label>
                  </div>
                </div>
              </div>

              <div class="gender-details">
                <input type="radio" name="author_gender" value="male" id="dot-1">
                <input type="radio" name="author_gender" value="female" id="dot-2">
                <input type="radio" name="author_gender" value="It doesn't matter to me" id="dot-3">
                <span class="gender-title">Do you prefer to read books by:</span>
                <div class="category">
                  <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender" value="male">Male Authors</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender" value="female">Female Authors</span>
                  </label>
                  <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender" value="It doesn't matter to me">It doesn't matter to me</span>
                  </label>
                </div>
              </div>

              <div class="input-box">
                <span class="details">How do you discover new books to read?</span>
                <div>
                  <div>
                    <input type="checkbox" name="discover_book[]" value="Book Clubs">
                    <label for="adventure">Book Clubs</label>
                  </div>
                  <div>
                    <input type="checkbox" name="discover_book[]" value="Bestseller List">
                    <label for="child-lit">Bestseller List</label>
                  </div>
                  <div>
                    <input type="checkbox" name="discover_book[]" value="Recommendations from friends/family">
                    <label for="contemporary">Recommendations from friends/family</label>
                  </div>
                  <div>
                    <div>
                      <input type="checkbox" name="discover_book[]" value="Social media">
                      <label for="drama">Social media</label>
                    </div>
                    <div>
                      <input type="checkbox" name="discover_book[]" value="Bookstores/Libraries">
                      <label for="fable">Bookstores/Libraries</label>
                    </div>
                    <div>
                      <input type="checkbox" name="discover_book[]" value="Online Book Reviews/Blogs">
                      <label for="fantasy">Online Book Reviews/Blogs</label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="gender-details">
                <input type="radio" name="pref_book" value="Standalone Books" id="dot-4">
                <input type="radio" name="pref_book" value="Standalone Books" id="dot-5">
                <input type="radio" name="pref_book" value="It doesn't matter to me" id="dot-6">
                <span class="gender-title">Do you prefer to read Standalone Books or Book Series?</span>
                <div class="category">
                  <label for="dot-4">
                    <span class="dot one"></span>
                    <span class="gender" value="Standalone Books">Standalone Books</span>
                  </label>
                  <label for="dot-5">
                    <span class="dot two"></span>
                    <span class="gender" value="Standalone Books">Book Series</span>
                  </label>
                  <label for="dot-6">
                    <span class="dot three"></span>
                    <span class="gender" value="It doesn't matter to me">It doesn't matter to me</span>
                  </label>
                </div>
              </div>
            </div>

            <div class="gender-details">
              <input type="radio" name="pref_reading" value="Beginner/Young adult" id="dot-7">
              <input type="radio" name="pref_reading" value="Intermediate" id="dot-8">
              <input type="radio" name="pref_reading" value="Advanced" id="dot-9">
              <span class="gender-title">What is your preferred reading level?</span>
              <div class="category">
                <label for="dot-7">
                  <span class="dot one"></span>
                  <span class="gender" name="pref_reading" value="Beginner/Young adult">Beginner/Young adult</span>
                </label>
                <label for="dot-8">
                  <span class="dot two"></span>
                  <span class="gender" name="pref_reading" value="Intermediate">Intermediate</span>
                </label>
                <label for="dot-9">
                  <span class="dot three"></span>
                  <span class="gender" name="pref_reading" value="Advanced">Advanced</span>
                </label>
              </div>
            </div>
            <?php

            //session_start();
            include('connection.php');



            if (isset($_POST['submit'])) {

              $user_id = $_SESSION['user_id'];
              $fave_book = mysqli_real_escape_string($conn, $_POST['fave_book']);
              $fave_author = mysqli_real_escape_string($conn, $_POST['fave_author']);
              $genres = isset($_POST['genre']) ? $_POST['genre'] : array();
              $book_format =  isset($_POST['book_format']) ? $_POST['book_format'] : array();
              $author_gender = mysqli_real_escape_string($conn, $_POST['author_gender']);
              $discover_book =  isset($_POST['discover_book']) ? $_POST['discover_book'] : array();
              $pref_book = mysqli_real_escape_string($conn, $_POST['pref_book']);
              $pref_reading = mysqli_real_escape_string($conn, $_POST['pref_reading']);

              foreach ($genres as $genre) {
                $sql = "INSERT INTO user_pref (user_id, fave_book, fave_author, genre, book_format, author_gender, discover_book, pref_book, pref_reading) 
                        VALUES ('$user_id', '$fave_book', '$fave_author', '$genre', '', '$author_gender', '', '$pref_book', '$pref_reading')";
                if ($conn->query($sql) != TRUE) {
                  echo '<script>alert("Sign up failed. Please check your input and try again.");</script>';
                  exit();
                }
              }

              foreach ($book_format as $format) {
                $sql = "INSERT INTO user_pref (user_id, fave_book, fave_author, genre, book_format, author_gender, discover_book, pref_book, pref_reading) 
                        VALUES ('$user_id', '$fave_book', '$fave_author', '', '$format', '$author_gender', '', '$pref_book', '$pref_reading')";
                if ($conn->query($sql) != TRUE) {
                  echo '<script>alert("Sign up failed. Please check your input and try again.");</script>';
                  exit();
                }
              }

              foreach ($discover_book as $discover) {
                $sql = "INSERT INTO user_pref (user_id, fave_book, fave_author, genre, book_format, author_gender, discover_book, pref_book, pref_reading) 
                        VALUES ('$user_id', '$fave_book', '$fave_author', '', '', '$author_gender', '$discover', '$pref_book', '$pref_reading')";
                if ($conn->query($sql) != TRUE) {
                  echo '<script>alert("Sign up failed. Please check your input and try again.");</script>';
                  exit();
                }
              }
              // Success message and redirection
              echo '<script>alert("Thank you for submitting your preferences!");</script>';
              echo "<script>window.location.href = 'homepage.php?user_id={$_SESSION['user_id']}';</script>";
            }

            ?>

            <div class="button">
              <input type="submit" name="submit" value="Submit">
            </div>
      </form>
    </div>
  </div>




</body>

</html>
