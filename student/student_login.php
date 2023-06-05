<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login</title>

    <!-- Link fo css file -->
    <link rel="stylesheet" href="student_style.css">

    
</head>

<body>

<?php
require('mysqli_connect.php');

    session_start();

    //If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
            //remove backlashes
        $username = stripslashes($_REQUEST['username']);
            //escape special characters in a string
        $username = mysqli_real_escape_string($dbc, $username);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($dbc, $password);

        //Checking is user existing in the database or not
            $query = "SELECT * FROM `student` WHERE username='$username' and password='".md5($password)."'"; 
            $result = mysqli_query($dbc, $query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['username'] = $username;
                    //Redirect user to index.php
                header("Location: student_homepage.php");
            } else {
                echo "<script>
                if (confirm('Username/password is incorrect. Click OK to login.')) {
                    window.location.href = 'student_login.php';
                }
                </script>";
            }
            
    }else {

?>


<!-- Student login form -->

<div class="wrapper">
    <form action="" method="post">
        <div class=header-text> LOGIN AS STUDENT </div>
     	
           
            <input type="text" name="username" placeholder="Username" required><br>

            
            <input type="password" name="password" placeholder="Password" required><br>
            
        
            <p> </p>
            <div class=para-text> <p>Not registered yet? <a href='student_register.php'>Register Here</a></p> </div>

            <br>

            <button type="submit">LOGIN</button>
     </form>
</div>

<?php } ?>

</body>
</html>