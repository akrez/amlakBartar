<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/database.php';

session_start(); 

$app = new \Bramus\Router\Router();
$app->setNamespace('\AmlakBartar');
$app->get('/', 'HomeController@home');

//routes of login
$app->get('loginForm', 'AuthController@loginForm');
$app->post('/login', 'AuthController@login');
$app->get('/enterCode', 'AuthController@enterCode');
$app->post('checkCode', 'AuthController@checkCode');
$app->get('/enterPassword', 'AuthController@enterPassword');
$app->post('checkPassword', 'AuthController@checkPassword');
$app->get('/requestSetPass', 'AuthController@requestSetPass');
$app->post('/resetPassword', 'AuthController@resetPassword');
$app->get('/profile', 'AuthController@profile');
$app->post('/profileEdit', 'AuthController@profileEdit');
$app->get('/logOut', 'AuthController@logOut');


//routes of register
$app->get('/register', 'RegisterController@register');
$app->post('/store', 'RegisterController@store');



//routes of melk
$app->get('/amlakbartar', 'MelkController@amlakbartar');
$app->get('/melk', 'MelkController@melk');
$app->get('/melkList', 'MelkController@melkList');
$app->get('/melkEdit', 'MelkController@melkEdit');
$app->post('/melkStore', 'MelkController@melkStore');
$app->post('/melkUpdate', 'MelkController@melkUpdate');
$app->get('/comments', 'MelkController@comments');
$app->post('/commentStore', 'MelkController@commentStore');




$app->run();