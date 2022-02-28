<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['login']    = 'auth/login';
$route['register'] = 'auth/register';
$route['recovery'] = 'auth/recovery';
$route['validation'] = 'auth/validation';
$route['logout']    = 'auth/logout';
$route['reset_password']    = 'auth/reset_password';

# Painel Adminsitrativo
$route['restrict'] = 'restrict';
$route['restrict/email'] = 'email';
$route['restrict/email/resgister_server'] = 'email/resgister_server';
$route['restrict/email/send_email'] = 'email/send_email';
$route['restrict/email/delete/(:any)'] = 'email/delete/$1';
$route['restrict/admin/users'] = 'dashboard/users';
$route['restrict/admin/services'] = 'dashboard/services';
$route['restrict/admin/schedule'] = 'dashboard/schedule';
$route['restrict/admin/cars'] = 'dashboard/cars';

# Painel do Usuário
$route['restrict/users'] = 'users/users';
$route['restrict/services'] = 'users/services';
$route['restrict/schedule'] = 'users/schedule';
$route['restrict/cars'] = 'users/cars';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
