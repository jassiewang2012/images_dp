<?php
$servername = "localhost";
$username = "lghusa_wplive";
$password = "NI3Nuy6V{&X;";
$dbname = "lghusa_wplive";

if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($dbname))
{
    exit('Error: could not select the database');
}
?>



