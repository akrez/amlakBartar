<?php

namespace AmlakBartar;

use Rakit\Validation\Validator;
use AmlakBartar\Models\User;


class RegisterController extends HomeController
{

    public function register()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;
        $_SESSION['name'] = '';
        $_SESSION['email'] = '';
       
        $this->render('users/register');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'email'          => 'email',
            'password'       => 'min:6',
            'password_again' => 'same:password'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $_SESSION['error'] = $errors->firstOfAll();
            $this->render('users/register');
            exit;
        }

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password_again = trim($_POST['password_again']);
        if($name && $email && $password && $password_again){
            if (!$this->loggedIn()) {
                $password = md5($password);
                $user = User::firstWhere('email',$email);
                if($user){
                    $_SESSION['error'] = 'این ایمیل : ' . $email . ' قبلا ثبت نام کرده است';
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $this->render('users/register');
                } else
                {
                    User::insert([
                        'name' => $name,
                        'email' => $email,
                        'password' => $password
                    ]);
                    $_SESSION['message'] = 'ثبت نام شما با موفقیت انجام شد';
                    $_SESSION['error'] = 0;
                    $this->render('users/loginForm');
                }
            } else {
                $_SESSION['error'] = 'شما وارد سیستم شده اید';
                $this->render('users/register');
            }
        } else {
            $_SESSION['error'] = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/register');
        }
    }
}
