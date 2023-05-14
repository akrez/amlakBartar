<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ .'/DataBase.php';

session_start(); 

$app = new \Bramus\Router\Router();
$app->setNamespace('\Anisra\AmlakBartar');

//routes of login
$app->get('/', 'LoginController@loginView');
$app->post('/login', 'LoginController@login');
$app->get('/logOut', 'LoginController@logOut');
$app->post('/password', 'LoginController@password');
$app->get('/recoverypass', 'LoginController@recoveryPass');
$app->post('/recovery', 'LoginController@recovery');
$app->post('/changepass', 'LoginController@changePass');
$app->get('/home', 'LoginController@home');



//routes of register
$app->get('/register', 'RegisterController@register');
$app->post('/sort', 'RegisterController@sort');


//routes of melk
$app->get('/melk', 'MelkController@melk');
$app->post('/sortMelk', 'MelkController@sort');



$app->run();