<?php
namespace Anisra\AmlakBartar;
use Jenssegers\Blade\Blade as LaravelBlade;


class RegisterController extends HomeController

{
    public  function send_email($to,$TCode){
        
        $subject ="کد فعالسازی";
        $message ="کد فعالسازی شما.'$TCode' می باشد ";
        $from="FROM: saravari61@gmail.com";
        try{
            $retval = mail ($to,$subject,$message,$from);
            if( $retval == true )
                $Error="یک کد فعالسازی برای ایمیل شما فرستاده شد ";
            else
                throw new Exception('خطایی رخ داده است');
                
        }catch(Exception $ex){ $error=$ex->getMessge();
            $this->render('users/check',compact('error'));

        }
        
    }
      

    public function register(){

        $errors= 0;
        $message= 0;

        $this->render('users/register',compact('errors','message'));
    }


    

    public function sort(){

        $errors= 0;
        $message= 0;

        global $mysql_connect;

        if(!empty($_POST['name']) 
        && !empty($_POST['email']) 
        && !empty($_POST['password']) 
        && !empty($_POST['password_again'])){

            $name=$_POST['name']; 
            $email=$_POST['email'];
            $password=$_POST['password']; 
            $password_again=$_POST['password_again'];
    
            if($password != $password_again){
                $errors='تکرار کلمه عبور همخوانی ندارد';
                $this->render('users/register',compact('errors','message'));
            }else {
            
                    $password= md5($password);
                    $query = "INSERT  INTO users VALUES ('','".mysqli_real_escape_string($mysql_connect, $name)."',
                    '".mysqli_real_escape_string($mysql_connect, $email)."',
                    '".mysqli_real_escape_string($mysql_connect, $password)."')";
                    mysqli_query($mysql_connect,$query);
                    $message='ثبت نام شما با موفقیت انجام شد'; 
                    $this->render('users/register',compact('errors','message'));
                }

            }else {
            $errors='فیلدهای خالی را پر کنید';
            $this->render('users/register',compact('errors','message'));
        }                         
    }
  
}

?>