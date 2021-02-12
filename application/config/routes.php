<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'crud';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'crud/index';
$route['insert'] = 'crud/insert';
$route['records'] = 'crud/fetch';
$route['delete/(:num)'] = 'crud/delete/$1';
$route['edit/(:num)'] = 'crud/edit/$1';
$route['update/(:num)'] = 'crud/update/$1';  