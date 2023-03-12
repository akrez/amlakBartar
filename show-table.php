<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.css">

</head>
<body style="display:flex; justify-content:center;">
            
<div class="thumbnail col-xs-8 col-sm-8" style="margin-top:100px; background-color:lightgrey;">
<?php
$conn_error = 'ارتباط با دیتابیس امکانپذیر نیست';

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'practice';

if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($mysql_connect, $mysql_db))
{
    die($conn_error);
}else{
    $query=" SELECT * FROM users ORDER BY id";
    echo "<table  class='table table-striped table-bordered table-hover' style='text-align:center;'>
    <tr><h4>جدول اطلاعات کاربران</h4></tr>
    <tr>
    
    <td><h4>کد کاربر</h4></td>
    <td><h4>نام</h4></td>
    <td><h4>ایمیل</h4></td>
    <td><h4>کلمه عبور</h4></td>
    
    </tr>";
   if($query_run= mysqli_query($mysql_connect,$query)){
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_array($query_run)){
                
                echo     "<tr>";
                echo     "<td>".$row['id']."</td>";
                echo     "<td>".$row['name']."</td>";
                echo     "<td>".$row['email']."</td>";
                echo     "<td>".$row['password']."</td>";
                echo     "<tr>";
       
            }
            echo     "</table>";

        }else{
            echo "<p class='alert alert-danger'>رکوردی برای نمایش موجود نیست</p>";
           }

   }
} 
?>
</body>

</html>