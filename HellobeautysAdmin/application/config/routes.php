<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'order';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dealer'] = 'dealer';
$route['dealer_add'] = 'dealer/add';
$route['dealer/(:num)'] = 'dealer/edit/$1';
$route['dealer_delete/(:num)'] = 'dealer/delete/$1';

$route['video'] = 'video';
$route['video_add'] = 'video/add';
$route['video/(:num)'] = 'video/edit/$1';
$route['video_delete/(:num)'] = 'video/delete/$1';

$route['order'] = 'order';
$route['order/(:num)'] = 'order/edit/$1';
$route['order_delete/(:num)'] = 'order/delete/$1';
$route['order_notify/(:num)'] = 'order/notify/$1';

$route['product'] = 'product';
$route['product_add'] = 'product/add';
$route['product/(:num)'] = 'product/edit/$1';
$route['product_delete/(:num)'] = 'product/delete/$1';

$route['category'] = 'category';
$route['category_add'] = 'category/add';
$route['category/(:num)'] = 'category/edit/$1';
$route['category_delete/(:num)'] = 'category/delete/$1';

$route['blog'] = 'blog';
$route['blog_add'] = 'blog/add';
$route['blog/(:num)'] = 'blog/edit/$1';
$route['blog_delete/(:num)'] = 'blog/delete/$1';

$route['review'] = 'review';
$route['review_add'] = 'review/add';
$route['review/(:num)'] = 'review/edit/$1';
$route['review_delete/(:num)'] = 'review/delete/$1';
