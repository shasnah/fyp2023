<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Administrator</title>

    <!-- Link fo css file -->
    <link rel="stylesheet" href="admin_style.css">

    
</head>

<body>

<?php
        require('mysqli_connect.php');

        //if form submitted, insert value into database
        if(isset($_REQUEST['admin_username'])) {
            //remove backslashes
            $admin_username = stripcslashes($_REQUEST['admin_username']);
            //escape special char in a string
            $admin_username = mysqli_real_escape_string($dbc,$admin_username);
            $admin_password = stripcslashes($_REQUEST['admin_password']);
            $admin_password = mysqli_real_escape_string($dbc,$admin_password);
                $query = "INSERT into `admin` (admin_username, admin_password) VALUES ('$admin_username', '".md5($admin_password)."')";
                $result = mysqli_query($dbc, $query);
            if($result){
                echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='admin_login.php'>Login</a></div>"; 
            }
        } else{ ?>

<!-- Admin register form -->

<div class="wrapper">
<form action="" method="post">
     	<div class=header-text> REGISTER AS ADMIN </div>
     	
     	<!-- <label>Username</label> -->
     	<input type="text" name="admin_username" placeholder="Username" required><br>

     	<!-- <label>Password</label> -->
     	<input type="password" name="admin_password" placeholder="Password" required><br>

     	<button type="submit"> REGISTER </button>
</form>
</div>

<?php } ?>


</body>
</html>