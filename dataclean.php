<?php session_start();
include 'header.php';
 require 'db_connect.php';
 

        $sql = "UPDATE IM_images SET
                      print_t=0 WHERE print_t>0";

                   $result = mysql_query($sql);    
 
 include 'admin.php';

 ?>