<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['repos/index'] = 'repos/index';
$route['repos/create'] = 'repos/create';
$route['repos/update'] = 'repos/update';


$route['repos/(:any)'] = 'repos/view/$1';
$route['repos'] = 'repos/index';


$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
