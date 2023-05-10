<?php
include('modal_conn.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "select * from `books` where id='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="../css/Adminpage-modal.css" />
    <link rel="stylesheet" type="text/css" href="../css/adminpage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="../images/Web_Icon.png" type="image/png">
    <title>Treasure Shelf</title>

    <style>
        .text {
            text-align: left !important;
            text-indent: 5px;
            margin-bottom: 2px;
            font-size: 11px;
            display: flex;
            color: rgb(183, 183, 183);

        }
        .modal_content_addbook{
            margin-top: 20px !important;
        }

        .modal_content_addbook input[type='button'] {
            border-radius: 20px;
            background-color: #9EA6AA;
            color: white !important;
            font-size: 12px;
            width: 150px;
            height: 30px;
            border: none;
            box-shadow: 0 5px 5px black;
            margin-top: 10px;
            text-indent: 0px;
        }

        .modal_content_addbook input[type='submit'] {
            border-radius: 20px;
            background-color: #9EA6AA;
            color: white !important;
            font-size: 12px;
            width: 150px;
            height: 30px;
            border: none;
            box-shadow: 0 5px 5px black;
            margin-top: 10px;
            text-indent: 0px;
        }
    </style>
</head>

<body>
    <div class="editpage">
    <form action="update-query-book.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="modal_up" id="modal_up" >
            <div class="modal_content_addbook">
                <h1>UPDATE BOOKS INFORMATION</h1>
                
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />

                    <div id="img-preview" value="<?php echo "<img src='../uploads/".$row['book_cover']."' >";?>">
                        <?php echo "<img src='../uploads/".$row['book_cover']."' >";?>
                    </div>
                    <input type="file" accept="image/*" id="my_image" name="my_image"  name="book_cover" value="<?php echo "<img src='../uploads/".$row['book_cover']."' >";?>" >


                    <input name="book_title" type="text" id="book_title" placeholder="Book Title" value="<?php echo $row['book_title'] ?>" ></input>
                    <input type="text" name="genre" id="genre" list="genre_list" placeholder="Book Genre" value="<?php echo $row['genre'] ?>" >
                    <datalist id="genre_list">
                        <option value="Adventure">Adventure</option>
                        <option value="Children Literature">Children Literature</option>
                        <option value="Contemporary">Contemporary</option>
                        <option value="Drama">Drama</option>
                        <option value="Fable">Fable</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Fiction">Fiction</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Memoirs">Memoirs</option>
                        <option value="Mythology">Mythology</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Non-fiction">Non-fiction</option>
                        <option value="Novel">Novel</option>
                        <option value="Poetry">Poetry</option>
                        <option value="Romance">Romance</option>
                        <option value="Rom-Com">Rom-Com</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Self Help">Self Help</option>
                        <option value="Thrillers">Thrillers</option>
                        <option value="Truecrime">Truecrime</option>
                    </datalist>

                    <input name="author" type="text" id="author" placeholder="Book Author"  value="<?php echo $row['author'] ?>" >
                    <textarea name="description" type="text" id="description" placeholder="Books Description"> <?php echo $row['description'] ?></textarea>

                    <input type="submit" name="submit" id="createbtn" value="Update"></input>      
                    <input type="button" value="Cancel" onClick="location.href='admin-mngbook.php'"></input>

                
            </div>
        </div>
    </form>
    </div>
    <script src="../js/adminpage.js"></script>

</body>

</html>