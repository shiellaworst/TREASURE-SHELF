<?php
include("developers.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="../css/adminpage.css" />
    <link rel="stylesheet" type="text/css" href="../css/Adminpage-modal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="../images/Web_Icon.png" type="image/png">
    <title>Treasure Shelf</title>
    <style>

    </style>

</head>

<body>

    <div class="header">
        <img src="../images/LOGO3B.png" onclick="location.href='admin-home.php'">
        <span>TREASURE SHELF:<br>BOOK ONLINE RECOMMENDATIONS</span>
    </div>

    <!-- <MANAGE USER MODAL> -->
    <div class="homepage1">
        <div class="mnguser">
            <h1>Manage User</h1>
            <div class="add-btn">
                <input type="submit" value="Add" onclick="openModal_add()"></input>
            </div>

            <form action="admin-mnguser.php" method="post">
                <div class="top-nav">
                    <input type="search" name="valueToSearch"></input>
                    <input type="submit" name="search" value="search"></input>

                </div>
                <div class="data1">
                    <?php echo $deleteMsg ?? ''; ?>

                    <div class="main" id="section2">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Last_Name</th>
                                <th>First_Name</th>
                                <th>M.I</th>
                                <th>Email</th>
                                <th>User_Type</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <!-- populate table from mysql database -->

                            
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
                                        <?php echo $row['lname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_type']; ?>
                                    </td>

                                    <td>
                                        <div><a href="update-user.php?id=<?php echo $row['id']; ?>"><i
                                                    class="bi bi-pen"></i></a></div>
                                    </td>
                                    <td>
                                        <?php
                                        echo "<a onClick =\"javascript:return confirm('Are you sure to delete this user?');\" 
                                            href='delete.php?id={$row['id']}'>
                                            <i class='bi bi-trash3'></i></a>";
                                        ?>
                                    </td>
                                </tr>
                            <?php $sn++; }}} ?>

                    
                        </table>
                    </div>
                </div>
            </form>
        </div>

        <form action="upload1.php" method="POST" enctype="multipart/form-data">
            <div class="modal_add" id="modal_add">
                <div class="modal_content"><br>

                    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                    <input type="text" name="fname" id="fname" placeholder="First Name">
                    <div style="display: flex">
                        <input type="text" name="mi" id="mi" placeholder="M.I." style="width: 90px">
                        <select id="user_type" name="user_type" placeholder="User type">
                            <option value="" disabled selected disabled>Select User type</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div><br>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" placeholder="Confirmed Password"><br><br>

                    <input type="submit" name="submit" id="createbtn" value="Add">
                    <input type="submit" value="Cancel" onclick="closeModal_add()">
                </div>
            </div>
        </form>



        <!-- </MANAGE USER MODAL> -->

    </div>
    </div>

    <div class="navigation">
        <ul class="listWrap">
            <li class="list" onclick="location.href='admin-home.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-columns-gap"></i>
                    </i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="list active" onclick="location.href='admin-mnguser.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-person-gear"></i>
                    </i>
                    <span class="text" class="btn">Manage User</span>
                </a>
            </li>
            <li class="list" onclick="location.href='admin-mngbook.php'">
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
    </div>

    <script src="../js/adminpage.js"></script>


</body>
</htrml>