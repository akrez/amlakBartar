<?php

namespace Anisra\AmlakBartar;

use Rakit\Validation\Validator;
use ConnectDatabase\DataBase;



class RegisterController extends HomeController

{

    public  function send_email($to, $TCode)
    {

        $subject = "کد فعالسازی";
        $message = "کد فعالسازی شما.'$TCode' می باشد ";
        $from = "FROM: saravari61@gmail.com";
        try {
            $retval = mail($to, $subject, $message, $from);
            if ($retval == true)
                $Error = "یک کد فعالسازی برای ایمیل شما فرستاده شد ";
            else
                throw new Exception('خطایی رخ داده است');
        } catch (Exception $ex) {
            $error = $ex->getMessge();
            $this->render('users/check', compact('error'));
        }
    }

    public function register()
    {

        $error = 0;
        $errors = 0;
        $message = 0;
        $name = '';
        $email = '';
        $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
    }

    public function sort()
    {

        $error = 0;
        $errors = 0;
        $message = 0;
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'email'          => 'email',
            'password'       => 'min:6',
            'password_again' => 'same:password'
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
            exit;
        }

        if (
            !empty($_POST['name'])
            && !empty($_POST['email'])
            && !empty($_POST['password'])
            && !empty($_POST['password_again'])
        ) {

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password_again = trim($_POST['password_again']);

            if (!$this->loggedin()) {
                $password = md5($password);
                $db = new DataBase;
                if ($db->select("SELECT * FROM users WHERE email='$email'")) {
                    $error = 'این ایمیل : ' . $email . ' قبلا ثبت نام کرده است';
                    $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
                } elseif ($db->change("INSERT  INTO users VALUES ('','$name','$email','$password')")) {
                    $message = 'ثبت نام شما با موفقیت انجام شد';
                    $this->render('users/loginview', compact('errors', 'error', 'message'));
                }
            } else {
                $error = 'شما وارد سیستم شده اید، نیازی به ثبت نام نیست';
                $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
            }
        } else {
            $error = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
        }
    }
}
