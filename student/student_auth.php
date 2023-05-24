

<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("Location: student_login.php");
    
    exit();
}
?>