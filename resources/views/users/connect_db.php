<?php

session_start(); 

$error = 'ارتباط با دیتابیس امکانپذیر نیست';

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
                        
$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'amlakbartar';
                        
if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($mysql_connect, $mysql_db))
    {
        die($error);
    }
?>