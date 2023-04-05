<?php
namespace Anisra\AmlakBartar;
use Jenssegers\Blade\Blade as LaravelBlade;
use Rakit\Validation\Validator;


class LoginController extends HomeController
{

    
    public function login_view(){

        $errors= 0;
        $message= 0;

        $this->render('users/login_view',compact('errors','message'));
    }


    public function password(){

        $errors= 0;
        $message= 0;

            $validator = new Validator;
            $validation = $validator->validate($_POST,[
                'password'=>'required'
            ]);
 
            if($validation->fails()){
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
                $this->render('users/password',compact('errors','message'));
                exit;
            } 

        global $mysql_connect;


        if(!empty($_POST['password'])){
            $password = md5($_POST['password']);
            $query="SELECT name FROM users WHERE password='".mysqli_real_escape_string($mysql_connect, $password)."'"; 
             if($query_run= mysqli_query($mysql_connect,$query)){
                if(mysqli_num_rows($query_run)){
                    $name = mysqli_fetch_assoc($query_run);
                    $this->render('users/home',compact('name'));
                }else{
                    $errors="کلمه عبور اشتباه است";
                    $this->render('users/password',compact('errors','message'));

                }      
            }
        }
 
    } 
    


    public function recoverypass(){
        $errors= 0;
        $message= 0;
        $this->render('users/recoverypass',compact('errors','message'));
 
    }

    public function login(){
        
        $errors= 0;
        $message= 0;
        $validator = new Validator;
            $validation = $validator->validate($_POST,[
                'email'=>'required|email'
            ]);
 
            if($validation->fails()){
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
                $this->render('users/login_view',compact('errors','message'));
                exit;
            } 

        global $mysql_connect;


        if(!empty($_POST['email'])){
            $email=$_POST['email'];

            $query="SELECT id FROM users WHERE email='".mysqli_real_escape_string($mysql_connect, $email)."'"; 
             if($query_run= mysqli_query($mysql_connect,$query)){
                if(mysqli_num_rows($query_run)){
                    $this->render('users/password',compact('errors','message'));
                }else{
                    $errors="این ایمیل موجود نیست! ابتدا باید ثبت نام کنید";
                    $this->render('users/register',compact('errors','message'));

                }      
            }
        }
 
    }
  
}

?>