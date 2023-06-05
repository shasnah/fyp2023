<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator</title>

    <!-- Link fo css file -->
    <link rel="stylesheet" href="admin_style.css">

    
</head>

<body>

<?php

require('mysqli_connect.php');

    session_start();

    //If form submitted, insert values into the database.
    if (isset($_POST['admin_username'])) {
            //remove backlashes
        $admin_username = stripslashes($_REQUEST['admin_username']);
            //escape special characters in a string
        $admin_username = mysqli_real_escape_string($dbc, $admin_username);

        $admin_password = stripslashes($_REQUEST['admin_password']);
        $admin_password = mysqli_real_escape_string($dbc, $admin_password);

        //Checking if admin exist in the database or not
            $query = "SELECT * FROM `admin` WHERE admin_username = '$admin_username' and admin_password = '".md5($admin_password)."'" ; 
            $result = mysqli_query($dbc, $query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);

                if($rows == 1) {
                session_start();
                $_SESSION['admin_username'] = $admin_username;
                    //Redirect user to admin_dashboard.php
                header("Location: admin_dashboard.php");
                }else {
                echo "<script>
                    if (confirm('Username/password is incorrect. Click OK to login.')) {
                        window.location.href = 'admin_login.php';
                    }
                </script>";
                }  

    }else { ?> 
 

<!-- Admin login form -->

<div class="wrapper">
<form action="" method="post">
     	<div class=header-text> LOGIN AS ADMIN </div>
     	
     	<!-- <label>Username</label> -->
     	<input type="text" name="admin_username" placeholder="Username" required><br>

     	<!-- <label>Password</label> -->
     	<input type="password" name="admin_password" placeholder="Password" required><br>

     	<button type="submit"> LOGIN </button>
</form>
</div>

<?php } ?>

</body>
</html>