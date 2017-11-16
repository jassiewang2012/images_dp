<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($dbname))
{
    exit('Error: could not select the database');
}
?>



