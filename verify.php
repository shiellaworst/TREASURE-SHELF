<?php
$con=mysqli_connect("localhost","root","","books_dataset");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database');</script>";
    exit();
}


if(isset ($_GET['email']) && isset($_GET['v_code']))
{
    $query="SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $result=mysqli_query($con,$query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
                $update="UPDATE `users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
                if(mysqli_query($con,$update))
                {
                    echo"
                    <script>
                    alert('Email Verification Successful');
                    window.location.href='index.php';
                    </script>";
                }
            }
            else
            {
                echo"
                <script>
                alert('Email Already registered');
                window.location.href='index.php';
                </script>";
            }
        }
    }
    else
    {
        echo"
                <script>
                alert('Can't Run Query');
                window.location.href='index.php';
                </script>";
    }
}
