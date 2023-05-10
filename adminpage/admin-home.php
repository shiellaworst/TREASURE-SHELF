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
    <link rel="stylesheet" type="text/css" href="Adminpage_modal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!--==== Icon CSS ===== -->
    <link rel="shortcut icon" href="../images/Web_Icon.png" type="image/png">
    <title>Treasure Shelf</title>
</head>

<body>


    <div class="header">
        <img src="../images/LOGO3B.png" onclick="location.href='admin-home.php'">
        <span>TREASURE SHELF:<br>BOOK ONLINE RECOMMENDATIONS</span>
    </div>

    <div class="homepage">
        <div class="home">
            <div class="title">
                <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
            </div>
            <div class="stats">
                <div class="stat1" onclick="location.href='admin-mnguser.php'">
                    <i class="bi bi-people"></i>
                    <span class="count"><br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "tsbr_db");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con, "select COUNT(*) FROM users where user_type='user'");
                        $row = mysqli_fetch_array($result);

                        $total = $row[0];
                        echo "" . $total;

                        mysqli_close($con);
                        ?>
                        <p>USERS</p>
                    </span>
                </div>
                <div class="stat2" onclick="location.href='admin-mngbook.php'">
                    <i class="bi bi-book"></i>
                    <span class="count"><br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "tsbr_db");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con, "select COUNT(*) FROM books");
                        $row = mysqli_fetch_array($result);

                        $total = $row[0];
                        echo "" . $total;

                        mysqli_close($con);
                        ?>
                        <p>BOOKS</p>
                    </span>

                </div>
                <div class="stat3" onclick="location.href='admin-mnguser.php'">
                    <i class="bi bi-person"></i>
                    <span class="count"><br>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "tsbr_db");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con, "select COUNT(*) FROM users where user_type='admin'");
                        $row = mysqli_fetch_array($result);

                        $total = $row[0];
                        echo "" . $total;

                        mysqli_close($con);
                        ?>
                        <p>ADMIN USERS</p>
                    </span>
                </div>
            </div>

            <div class="accounts">
                <div class="title">
                    <h1><i class="bi bi-person-lines-fill"></i> Accounts</h1>
                </div>
                <div class="data">
                    <?php echo $deleteMsg ?? ''; ?>
                    <div class="table">
                        <table class="table">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>ID</th>
                                    <th>Last_Name</th>
                                    <th>First_Name</th>
                                    <th>M.I</th>
                                    <th>Email</th>
                                    <th>User_type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                if (is_array($fetchData)) {
                                    $sn = 1;
                                    foreach ($fetchData as $data) {
                                        ?>
                                        <tr class="tablerow">
                                            <td>
                                                <?php echo $sn; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['lname'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['fname'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['mi'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['email'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['user_type'] ?? ''; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $sn++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $fetchData; ?>
                                        </td>
                                    <tr>
                                        <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="navigation">
        <ul class="listWrap">
            <li class="list active" onclick="location.href='admin-home.php'">
                <a href="javascript:void(0);">
                    <i class="icon">
                        <i class="bi bi-columns-gap"></i>
                    </i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="list" onclick="location.href=''">
                <a href="admin-mnguser.php">
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