<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/resources/views/users/connect_db.php';


$app = new \Bramus\Router\Router();
$app->setNamespace('\Anisra\AmlakBartar');

$app->get('/', 'LoginController@login_view');
$app->post('/login', 'LoginController@login');
$app->post('/password', 'LoginController@password');
$app->get('/recoverypass', 'LoginController@recoverypass');
$app->post('/recovery', 'LoginController@recovery');
$app->post('/changepass', 'LoginController@changepass');
$app->get('/home', 'LoginController@home');




$app->get('/register', 'RegisterController@register');
$app->post('/sort', 'RegisterController@sort');

$app->run();
