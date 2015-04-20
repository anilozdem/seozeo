<?php
    $db_server = 'localhost';
    $db_user = 'localhost';
    $db_pass = '001122';
    $db_name = 'seozeo';
    
    @$conn = mysql_connect($db_server, $db_user, $db_pass) or die ("Unable to connect to  DataBase."); 
    mysql_select_db($db_name, $conn) or die ("Unable to connect to  DataBase Table.");     
    
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
    
    session_start();
 ?>