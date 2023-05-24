<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Register</title>

    <!-- Link fo css file -->
    <link rel="stylesheet" href="student_style.css">

   
</head>

<body>

<?php

require('mysqli_connect.php');

        //if form submitted, insert value into database
        if(isset($_REQUEST['username'])) {
            $f_name =stripcslashes($_REQUEST['f_name']);
            $f_name =mysqli_real_escape_string($dbc,$f_name);

            $l_name =stripcslashes($_REQUEST['l_name']);
            $l_name =mysqli_real_escape_string($dbc,$l_name);

            $email =stripcslashes($_REQUEST['email']);
            $email =mysqli_real_escape_string($dbc,$email);

            $username = stripcslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($dbc,$username);

            $password = stripcslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($dbc,$password);

            $query = "INSERT into `student` (f_name, l_name, email, username, password) VALUES ('$f_name', '$l_name', '$email', '$username', '".md5($password)."')";
            $result = mysqli_query($dbc, $query);

                if($result){
                    echo "<div class='button'>
                    <h3>You are registered successfully.</h3>
                    <br/>Click here to <a href='student_login.php'>Login</a></div>";
                } else{
                    echo "Error registering the student.";
                }

        } else{
            
?>

 <!-- Student register form -->

<div class="wrapper">
    <form action="" method="post">
        <div class=header-text> REGISTER AS STUDENT </div>

    
            <input type="text" name="f_name" placeholder="First Name" required><br>

            
            <input type="text" name="l_name" placeholder="Last Name" required><br>

        
            <input type="email" name="email" placeholder="Email" required><br>
            
            
            <input type="text" name="username" placeholder="Username" required><br>


            <input type="password" name="password" placeholder="Password" required><br>

            <button type="submit">REGISTER</button>
     </form>
</div>

<?php } ?> 

</body>
</html>