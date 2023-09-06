<?php

namespace AmlakBartar;

use Jenssegers\Blade\Blade as LaravelBlade;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class HomeController
{
    public  function render($template, $data = [])
    {
        echo $this->returnTemplate($template, $data);
    }

    public  function returnTemplate($template, $data = [])
    {
        $blade = new LaravelBlade('./resources/views/', 'cache');
        $file = './resources/views/' . $template . '.blade.php';
        if (file_exists($file)) {
            return $blade->render($template, $data);
        } else {
            $template = 'errors/404';
            return $blade->render($template, $data);
        }
    }

    function loggedIn()
    {
        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            return true;
        } else {
            return false;
        }
    }

    function home()
    {
        $this->render('users/home');
    }

    public  function sendEmail($to, $code)
    {
        
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.codexworld.com";
        $mail->SMTPAuth = true;
        $mail->Username = "user@codexworld.com";
        $mail->Password = "demo.user@pass";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        
       

        $mail->setFrom('sender@codexworld.com', 'CodexWorld');

        $mail->addAddress($to);

        $mail->isHTML(true);

        $mail->Subject = 'کد ورود';
        $mail->Body = "کد ورود شما.'$code' می باشد ";
        
        try {
            $mail->send();
            $msg = " کد ورود برای ایمیل شما فرستاده شد ";
            } catch (Exception $e) {
            $msg = "خطایی رخ داده است:  " . $mail->ErrorInfo;
        }

        return $msg;
    }
}