<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/resources/views/users/connect_db.php';


$app = new \Bramus\Router\Router();
$app->setNamespace('\Anisra\AmlakBartar');

$app->get('/', 'LoginController@login_view');
$app->post('/login', 'LoginController@login');
$app->post('/password', 'LoginController@password');
$app->get('/recoverypass', 'LoginController@recoverypass');
$app->get('/home', 'LoginController@home');




$app->get('/register', 'RegisterController@register');
$app->post('/sort', 'RegisterController@sort');
$app->post('/verifycode', 'RegisterController@verifycode');



$app->run();