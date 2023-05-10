<?php
include("developers1.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="../css/adminpage.css" />
    <link rel="stylesheet" type="text/css" href="../css/adminpage-modal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="../images/Web_Icon.png" type="image/png">
    <title>Treasure Shelf</title>

    <style>
        .desc{
        display: inline-block;
        width: 150px;
        text-overflow: ellipsis;
        font-size: 12px;
        display: -webkit-box; 
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        white-space: pre-wrap;
        }
    </style>
</head>

<body>
<!-- <MANAGE BOOK MODAL> -->
    <div class="header">
        <img src="../images/LOGO3B.png" onclick="location.href='admin-home.php'">
        <span>TREASURE SHELF:<br>BOOK ONLINE RECOMMENDATIONS</span>
    </div>

    <div class="homepage2">
        <div class="mngbook">
            <h1>Manage Book</h1>
            <div class="add-btn">
            <input type="submit" value="Add" onclick="openModal_add_book()"></input>
            </div>

            <form action="admin-mngbook.php" method="post">
                <div class="top-nav">
                    <input type="search" name="valueToSearch"></input>
                    <input type="submit" name="search" value="Search"></input>
                </div>
                <div class="data1">  
                    <?php echo $deleteMsg??''; ?>
                    <table class="table">
                        <tr>
                            <th>B#</th>
                            <th>Book_Cover</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Author</th>
                            <th>Book_Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            if (is_array($fetchData)) {
                                $sn = 1;
                                foreach ($fetchData as $data) {
      
                            while ($row = mysqli_fetch_array($search_result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sn; ?>
                                    </td>
                                    <td>
                                        <div class="BC_display">
                                            <?php echo "<img src='../uploads/".$row['book_cover']."' >";?>
                                        </div>   
                                    </td>
                                    <td><?php echo $row['book_title']; ?></td>
                                    <td><?php echo $row['genre']; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><div class="desc"><?php echo $row['description']; ?></div></td>
                                    <td>
                                        <div><a href="update-book.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pen"></i></a></div>
                                    </td>
                                    <td class="del" >
                                        <?php
                                        echo "<a onClick =\"javascript:return confirm('Are you sure to delete this book?');\" 
                                        href='delete1.php?id={$row['id']}'>
                                        <i class='bi bi-trash3'></i></a>";
                                        ?>
                                    </td>
                                </tr>
                        <?php $sn++; }}} ?>
                    </table>
                </form>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <!-- <MANAGE BOOK MODAL ADDING OF BOOK> -->
                    <div class="modal_add_book" id="modal_add_book">
                        <div class="modal_content_addbook"><br>
                            <?php if (isset($_GET['error'])): ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php endif ?>

                            <div id="img-preview"></div>
                            <input type="file" accept="image/*" id="my_image" name="my_image" required>


                            <input name="book_title" type="text" id="book_title" placeholder="Book Title" required>
                            <input type="text" name="genre" id="genre" list="genre_list" placeholder="Book Genre" required>
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

                            <input name="author" type="text" id="author" placeholder="Book Author" required>
                            <textarea name="description" type="text" id="description" placeholder="Books Description" required></textarea>

                            <input type="submit" name="submit" id="createbtn" value="Add"> </input>
                            <input type="submit" value="Cancel" onclick="closeModal_add_book()"></input><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
<!-- <MANAGE BOOK MODAL> -->
    <div class="navigation">
        <ul class="listWrap">
            <li  class="list" onclick="location.href='admin-home.php'";>
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-columns-gap"></i>
                    </i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="list" onclick="location.href='admin-mnguser.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-person-gear"></i>
                    </i>
                    <span class="text" class="btn">Manage User</span>
                </a>
            </li>
            <li class="list active" onclick="location.href='admin-mngbook.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-book"></i>
                    </i>
                    <span class="text">Manage Books</span>
                </a>
            </li>
            <li class="list" onclick="location.href='admin-userprofile.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-person"></i>
                    </i>
                    <span class="text">User Profile</span>
                </a>
            </li>
            <li class="indicator"></li>
        </ul>
    </div>
        

    <script src="../js/adminpage.js"></script>
</body>

</html>