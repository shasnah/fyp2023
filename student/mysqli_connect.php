

<?php #mysqli_connect.php

//This file contains the database access information
// This file also established a connection to MySQL
// select the database, and sets the encoding

//Set the database access information as constants:
DEFINE ('DB_USER', 'root') ;
DEFINE ('DB_PASSWORD','') ;
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME' ,'uniklrecommend');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySOL: '. mysqli_connect_error());

//Set the encoding..
mysqli_set_charset($dbc, 'utf8') ;
?>