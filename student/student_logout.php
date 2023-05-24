

<?php
session_start();
// Destroying All Sessions 
if (session_destroy())
{
    // Redirecting to Home Page
    header ("Location: student_login.php");
}
?>