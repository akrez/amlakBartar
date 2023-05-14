<?php
namespace Anisra\AmlakBartar;
use Rakit\Validation\Validator;
use ConnectDatabase\DataBase;


class LoginController extends HomeController
{
    public function loginView(){
        $error= 0;
        $errors= 0;
        $message= 0;

        $this->render('users/loginview',compact('errors','error','message'));
    }

    public function login(){
        $error= 0;
        $errors= 0;
        $message= 0;
        $name =''; 
        $email ='';

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES,[
                'email'=>'required|email'
        ]);
 
        if($validation->fails()){
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['email'];
            $this->render('users/loginview',compact('error'));
            exit;
        } 

        if(!empty($_POST['email'])){
            $email = trim($_POST['email']);
            $db = new DataBase;
            if($row = $db->select("SELECT * FROM users WHERE email='$email'")){
                $_SESSION['user_id'] = $row['id'];
               $this->render('users/password',compact('errors','error','message'));

            }else{
                $error="این ایمیل موجود نیست! ابتدا باید ثبت نام کنید";
                $this->render('users/register',compact('errors','error','message','name','email'));
            }      
        }
    }

    public function logOut(){
        $error= 0;
        $errors= 0;
        $message= 0; 

        session_destroy();
        $this->render('users/loginview',compact('errors','error','message'));
    }

    public function password(){
        $error= 0;
        $errors= 0;
        $message= 0;
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES,[
                'password'=>'required|min:6'
        ]);
 
        if($validation->fails()){
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['password'];
            $this->render('users/password',compact('errors','error','message'));
            exit;
        } 
        if(!empty($_POST['password'])){
            $password = trim($_POST['password']);
            $password = md5($password);
            $db = new DataBase;
            if($row = $db->select("SELECT * FROM users WHERE password='$password' and id='".$_SESSION['user_id']."'")){
                $name = $row['name'];
                $this->render('users/home',compact('name'));
            }else{
                $error="کلمه عبور اشتباه است";
                $this->render('users/password',compact('errors','error','message'));
                }   
        }
    }
 
    public function recoveryPass(){
        $error= 0;
        $this->render('users/recoverypass',compact('error'));
    }

    public function recovery(){
        $error= 0;
        $errors= 0;
        $message= 0;
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES,[
                'name'=>'required'
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['name'];
            $this->render('users/recoverypass',compact('error'));
            exit;
        } 
        if(!empty($_POST['name'])){
            $name = trim($_POST['name']);
            $db = new DataBase;
            if($db->select("SELECT * FROM users WHERE name='$name' and id='".$_SESSION['user_id']."'")){
                $this->render('users/changepass',compact('errors','error','message'));
            }else{

                $error="نام وارد شده اشتباه است";
                $this->render('users/recoverypass',compact('error'));
            }
        }
    }

    public function changePass(){
        $error= 0;
        $errors= 0;
        $message= 0;
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES,[

                'password'       => 'required|min:6',
                'password_again' => 'required|same:password'
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $this->render('users/changepass',compact('errors','error','message')); 
            exit; 
        }
           
        if(!empty($_POST['password']) && !empty($_POST['password_again'])){
            $password = trim($_POST['password']);
            $password = md5($password);
            $db = new DataBase;
            if($db->update("UPDATE  users SET password='$password' WHERE id='".$_SESSION['user_id']."'")){
                $message="تغیر کلمه عبور با موفقیت انجام شد";
                $this->render('users/password',compact('errors','error','message')); 
            }else{
                $error="خطایی رخ داده است";
                $this->render('users/changepass',compact('errors','error','message'));
            }
        }            
    }
}

?>