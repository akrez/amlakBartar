<?php


namespace AmlakBartar;

use Rakit\Validation\Validator;
use AmlakBartar\Models\User;

class AuthController extends HomeController
{
    public function loginForm()
    {
        $_SESSION['message'] = 0;
        $_SESSION['error'] = 0;
        $this->render('users/loginForm');
    }

    public function login()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;


        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'email' => 'required|email'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $_SESSION['error'] = $errors['email'];
            $this->render('users/loginForm');
            exit;
        }
            $email = trim($_POST['email']);
            $user = User::firstWhere('email',$email);
            if($user){
                $_SESSION['email'] = $email;
                $code = rand(10000, 99999);
                $_SESSION['code'] = $code;
                    //$message =$this->sendEmail($email,$code);
                $_SESSION['message'] = $code;
                $this->render('users/enterCode');
            }else{
                $_SESSION['error'] = "این ایمیل موجود نیست!";
                $_SESSION['message'] = 0;
                $_SESSION['name'] = '';
                $_SESSION['email'] = '';
                $this->render('users/register');  
            }                 
    }

    public function checkCode()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'code' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $_SESSION['error'] = $errors['code'];
            $this->render('users/enterCode');
            exit;
        }
            $code = trim($_POST['code']);
            if($code == $_SESSION['code']){
                $results = User:: where('email',$_SESSION['email'])->get();
                foreach($results as $result)
            {
                $_SESSION['name'] = $result->name;

            }
                $_SESSION['error'] = 0;
                $this->render('users/amlakbartar');
            } else {
                $_SESSION['error'] = " کد اشتباه است";
                $this->render('users/enterCode');
            }
    }

    public function enterPassword()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $this->render('users/enterPassword');
    }

    public function checkPassword()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $_SESSION['error'] = $errors['password'];
            $this->render('users/enterPassword');
            exit;
        }
            $password = trim($_POST['password']);
            $password = md5($password);
            $results = User::where('password', $password)->get();
            if($results){
                foreach($results as $result)
                {
                    $name = $result->name;
                    $_SESSION['name'] = $name;
                }
                $_SESSION['error'] = 0;
                $this->render('users/amlakbartar');
            }else {
                $_SESSION['error'] = " کلمه عبور اشتباه است";
                $this->render('users/enterPassword');
            }
    }

    public function recovery()
    {
        $_SESSION['message'] = 0;
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'name' => 'required'
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $_SESSION['error'] = $errors['name'];
            $this->render('users/recoverypass');
            exit;
        }
            $name = trim($_POST['name']);
            $db = new DataBase;
            if ($db->select("SELECT * FROM users WHERE name='$name' and id='" . $_SESSION['user_id'] . "'")) {
                $this->render('users/changepass', compact('errors', 'error', 'message'));
            } else {

                $error = "نام وارد شده اشتباه است";
                $this->render('users/recoverypass', compact('error'));
            }
    }

    public function changePass()
    {
        $error = 0;
        $errors = 0;
        $message = 0;
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [

            'password'       => 'required|min:6',
            'password_again' => 'required|same:password'
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $this->render('users/changepass', compact('errors', 'error', 'message'));
            exit;
        }

        if (!empty($_POST['password']) && !empty($_POST['password_again'])) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $db = new DataBase;
            if ($db->update("UPDATE  users SET password='$password' WHERE id='" . $_SESSION['user_id'] . "'")) {
                $message = "تغیر کلمه عبور با موفقیت انجام شد";
                $this->render('users/password', compact('errors', 'error', 'message'));
            } else {
                $error = "خطایی رخ داده است";
                $this->render('users/changepass', compact('errors', 'error', 'message'));
            }
        }
    }

    public function profile()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;
        
        $users = User::where('name',$_SESSION['name'])->get();
        $this->render('users/profile');
    }

    public function profileEdit()
    {

        if (
                !empty($_POST['name'])
            && !empty($_POST['email'])
            && !empty($_POST['password'])){ 

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password = md5($password);

            User::where('email',$_SESSION['email'])->update([
            'name' => $name,
            'email' => $email,
            'password' => $password ]);
            $_SESSION['message'] = 'ویرایش پروفایل با موفقیت انجام شد';
            $this->render('users/profile');
        }else {
            $_SESSION['error'] = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/profile');
        }
    }


        public function logOut()
        {
            $_SESSION['message'] = "از سیستم خارج شدید";
            $_SESSION['error'] = 0;
            session_destroy();
            $this->render('users/loginForm');
        }

}
