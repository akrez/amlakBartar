<?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_again'])){
        $name = $_POST['name'];
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        $password_again = $_POST['password_again']; 

        if(!empty($name) && !empty($email) && !empty($password) && !empty($password_again)){

            if($password != $password_again){
                $error='تکرار کلمه عبور همخوانی ندارد';
                }else {
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
                            $query = "INSERT  INTO users VALUES ('','$name','$email','$password')";
                            mysqli_query($mysql_connect,$query);
                            $message='ثبت نام شما با موفقیت انجام شد';

                            }

                    }
        }else {
            $error='لطفا فیلدهای خالی را پر کنید';
        }
    }
                            
?>

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
            
<div class="thumbnail col-xs-8 col-sm-3" style="margin-top:100px; background-color:lightgrey;">
            <?php
                if(isset($error)){
                    echo     "<p class='alert alert-danger'>$error</p>";
                }else if((isset($message))){
                    echo     "<p class='alert alert-success'>$message</p>";
                } 
                
            ?>
    <form action="" method="POST">

        <h4><p  style="text-align:center;">ثبت نام </p></h4><br>

        <div class="form-group"  >
            <label id="name">نام</label>
            <input type="text" class="form-control"  name="name"  maxlength="30" >
        </div>

        <div class="form-group">
            <label id="email">ایمیل</label>
            <input type="email" class="form-control"  name="email"  maxlength="30">
        </div>

        <div class="form-group">
            <label id="password">کلمه عبور</label>
            <input type="password" class="form-control"  name="password"  maxlength="30">
        </div>

        <div class="form-group">
            <label id="password">تکرار کلمه عبور</label>
            <input type="password" class="form-control"  name="password_again"  maxlength="30">
        </div>
    
        <div class="form-group">
            <button  type="submit" name="submit" class="btn btn-success">ثبت نام</button>

        </div>
      
    </form>
    
    <button  type="submit"  class="btn btn-primary" style="text-align:center" onclick="location.href='show-table.php'; ">نمایش اطلاعات کاربران</button>

</div>
</body>



</html>
