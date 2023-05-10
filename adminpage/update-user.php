
<?php
        include('modal_conn.php');
        $id = $_GET['id'];
        $query = mysqli_query($conn, "select * from `users` where id='$id'");
        $row = mysqli_fetch_array($query);
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
        .text{
            text-align: left !important;
            text-indent: 5px;
            margin-bottom: 2px;
            font-size:11px;
            display: flex;
            color: rgb(183, 183, 183);

        }
        .modal_content1 input[type='button']{
            border-radius: 20px;
            background-color: #9EA6AA;
            color: rgb(0, 0, 0) !important;
            font-size: 12px;
            width: 150px;
            height: 30px;
            border: none;
            box-shadow: 0 5px 5px black;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<div class="editpage">
    <div class="modal_up" id="modal_up">
        <div class="modal_content1"><br>
        <h1>UPDATE USER  INFORMATION</h1><br><br>
            <form method="POST" action="update-query-user.php?id=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                <div class="text">Last Name</div>
                <input type="text" placeholder="Last Name" name="lname" value="<?php echo $row['lname'] ?>"></input>
                <div class="text">First Name</div>
                <input type="text" placeholder="First Name" name="fname" value="<?php echo $row['fname'] ?>"></input>
                <div style="display: flex"><div class="text">M.I</div><div class="text" style="margin-left:70px;">User type</div></div>
                <div style="display: flex">
                    <input type="text" placeholder="M.I." style="width: 90px" name="mi" value="<?php echo $row['mi'] ?>"></input>
                    <select id="users" placeholder="User type" name="user_type" value="<?php echo $row['user_type'] ?>">
                        <option><?php echo $row['user_type']?></option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div><br>
                <div class="text">Email</div>
                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email'] ?>"></input><br><br>

                <input type="submit" value="Update"></input>         
                <input type="button" value="Cancel" onClick="location.href='admin-mnguser.php'"></input>

            </form>
        </div>
    </div>
</div>

</body>
</html>



