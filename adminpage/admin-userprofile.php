<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== CSS ======== -->
    <link rel="stylesheet" type="text/css" href="../css/Adminpage.css" />
    <link rel="stylesheet" type="text/css" href="../css/adminpage-modal.css" />
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

    <!-- <MANAGE USER MODAL> -->
    <div class="homepage3">
        <div class="userprof">
            <h1><br>USER PROFILE</h1><br>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
            <div class="text">Last Name</div>
            <input type="text" placeholder="Last Name" name="lname" value=""></input>
            <div class="text">First Name</div>
            <input type="text" placeholder="First Name" name="fname" value=""></input>
            <div style="display: flex"><div class="text">M.I</div><div class="text" style="margin-left:70px;">User type</div></div>
            <div style="display: flex">
                <input type="text" placeholder="M.I." style="width: 80px" name="mi" value=""></input>
                <select id="users" placeholder="User type" name="user_type" value="">
                    <option></option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div><br>
            <div class="text">Email</div>
            <input type="email" placeholder="Email" name="email" value=""></input><br><br>

            <input type="submit" value="Edit"></input>
            <input type="submit" value="Update"></input>         
                <?php
                echo "<a onClick =\"javascript:return confirm('Are you sure to sign out?');\" 
                href='logout.php'> <input type='button' value='Log out' > </input> </a>";
                ?>
            
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
            <li class="list" onclick="location.href='admin-mnguser.php'">
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
            <li class="list active" onclick="location.href='admin-userprofile.php'">
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