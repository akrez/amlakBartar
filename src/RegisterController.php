<?php

namespace Anisra\AmlakBartar;

use Jenssegers\Blade\Blade as LaravelBlade;
use Rakit\Validation\Validator;


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
            'name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required|min:6',
            'password_again' => 'required|same:password'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
            exit;
        }

        global $mysql_connect;

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
                $query = "SELECT email FROM users WHERE email='" . mysqli_real_escape_string($mysql_connect, $email) . "'";
                $query_run = mysqli_query($mysql_connect, $query);
                $query_num_rows = mysqli_num_rows($query_run);
                if ($query_num_rows >= 1) {
                    $error = 'این ایمیل : ' . $email . ' قبلا ثبت نام کرده است';
                    $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
                } else {
                    $query = "INSERT  INTO users VALUES ('','" . mysqli_real_escape_string($mysql_connect, $name) . "',
                            '" . mysqli_real_escape_string($mysql_connect, $email) . "',
                            '" . mysqli_real_escape_string($mysql_connect, $password) . "')";
                    mysqli_query($mysql_connect, $query);
                    $message = 'ثبت نام شما با موفقیت انجام شد';
                    $this->render('users/login_view', compact('errors', 'error', 'message'));
                }
            } else {
                $error = 'شما وارد سیستم شده اید، نیازی به ثبت نام نیست';
                $this->render('users/register', compact('errors', 'error', 'message', 'name', 'email'));
            }
        }
    }
}
