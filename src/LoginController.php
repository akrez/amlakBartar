<?php

namespace Anisra\AmlakBartar;

use Jenssegers\Blade\Blade as LaravelBlade;
use Rakit\Validation\Validator;


class LoginController extends HomeController
{
    public function login_view()
    {

        $error = 0;
        $this->render('users/login_view', compact('error'));
    }

    public function login()
    {
        $error = 0;
        $errors = 0;
        $message = 0;

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'email' => 'required|email'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['email'];
            $this->render('users/login_view', compact('error'));
            exit;
        }

        global $mysql_connect;

        if (!empty($_POST['email'])) {
            $email = trim($_POST['email']);

            $query = "SELECT id FROM users WHERE email='" . mysqli_real_escape_string($mysql_connect, $email) . "'";
            if ($query_run = mysqli_query($mysql_connect, $query)) {

                if (mysqli_num_rows($query_run)) {

                    $query_row = mysqli_fetch_assoc($query_run);
                    $user_id = $query_row['id'];
                    $_SESSION['user_id'] = $user_id;
                    $this->render('users/password', compact('errors', 'error', 'message'));
                } else {
                    $error = "این ایمیل موجود نیست! ابتدا باید ثبت نام کنید";
                    $this->render('users/register', compact('error'));
                }
            }
        }
    }

    public function password()
    {

        $error = 0;
        $errors = 0;
        $message = 0;

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'password' => 'required|min:6'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['password'];
            $this->render('users/password', compact('errors', 'error', 'message'));
            exit;
        }

        global $mysql_connect;

        if (!empty($_POST['password'])) {
            $password = trim($_POST['password']);
            $password = md5($password);

            $query = "SELECT name FROM users WHERE password='" . mysqli_real_escape_string($mysql_connect, $password) . "' and id='" . $_SESSION['user_id'] . "' ";
            $query_run = mysqli_query($mysql_connect, $query);

            if (mysqli_num_rows($query_run)) {

                $query_row = mysqli_fetch_assoc($query_run);
                $name = $query_row['name'];
                $this->render('users/home', compact('name'));
            } else {
                $error = "کلمه عبور اشتباه است";
                $this->render('users/password', compact('errors', 'error', 'message'));
            }
        }
    }

    public function recoverypass()
    {

        $error = 0;
        $this->render('users/recoverypass', compact('error'));
    }

    public function recovery()
    {
        $error = 0;
        $errors = 0;
        $message = 0;

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $error = $errors['name'];
            $this->render('users/recoverypass', compact('error'));
            exit;
        }

        global $mysql_connect;

        if (!empty($_POST['name'])) {
            $name = trim($_POST['name']);
            $query = "SELECT name FROM users WHERE name='" . mysqli_real_escape_string($mysql_connect, $name) . "' and id='" . $_SESSION['user_id'] . "' ";
            $query_run = mysqli_query($mysql_connect, $query);
            if (mysqli_num_rows($query_run)) {
                $this->render('users/changepass', compact('errors', 'error', 'message'));
            } else {

                $error = "نام وارد شده اشتباه است";
                $this->render('users/recoverypass', compact('error'));
            }
        }
    }

    public function changepass()
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

        global $mysql_connect;

        if (!empty($_POST['password']) && !empty($_POST['password_again'])) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $query = " UPDATE  users SET password ='" . mysqli_real_escape_string($mysql_connect, $password) . "'  WHERE id='" . $_SESSION['user_id'] . "' ";
            if (mysqli_query($mysql_connect, $query)) {
                $message = "عملیات با موفقیت انجام شد";
                $this->render('users/password', compact('errors', 'error', 'message'));
            } else {

                $error = "خطایی رخ داده است";
                $this->render('users/changepass', compact('errors', 'error', 'message'));
            }
        }
    }
}
