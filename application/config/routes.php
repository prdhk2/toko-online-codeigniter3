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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// frontend routes category, product, user, home, dan order
$route['category/(:num)']   = 'category/index/$1';
$route['product/(:num)']    = 'product/index/$1';
$route['user/(:num)']       = 'user/index/$1';
$route['home/(:num)']       = 'home/index/$1';
$route['order/(:num)']      = 'order/index/$1';
$route['products']          = 'home/All_products';

$route['available_promo']             = 'home/promoIndex';

// admin routes
$route['admin/dashboard']               = 'admin';
$route['admin/product/add']             = 'product/add_product';
$route['admin/product/index']           = 'product/index';
$route['product/store']                 = 'product/store';
$route['admin/category/add']            = 'category/add_category';
$route['admin/category/index']          = 'category/index';
$route['category/store']                = 'category/store';
$route['websetting/index']              = 'websetting/index';
$route['neworders/newOrders']           = 'orders/newOrders';
$route['neworders/paidOrders']          = 'orders/paidOrders';
$route['neworders/shippingOrders']      = 'orders/shippingOrders';
$route['neworders/deliveredOrders']     = 'orders/deliveredOrders';

// admin action routes 
$route['product/detail/(:num)']         = 'product/detail/$1';
$route['admin/product/edit/(:num)']     = 'product/edit/$1'; 
$route['admin/product/update/(:num)']   = 'product/delete/$1';
$route['admin/product/delete/(:num)']   = 'product/delete/$1';
$route['admin/category/edit/(:num)']    = 'category/edit/$1';
$route['admin/category/update/(:num)']  = 'category/update/$1';
$route['admin/category/delete/(:num)']  = 'category/delete/$1';

// admin banner config
$route['admin/banner']                  = 'websetting/index';
$route['admin/banner/add']              = 'websetting/add';
$route['admin/banner/store']            = 'websetting/store';
$route['admin/banner/edit/(:num)']      = 'websetting/edit/$1';
$route['admin/banner/update/(:num)']    = 'websetting/update/$1';
$route['admin/banner/delete/(:num)']    = 'websetting/delete/$1';

// admin promos config
$route['admin/promo']                   = 'promo/index';
$route['admin/promo/add']               = 'promo/add';
$route['admin/promo/store']             = 'promo/store';
$route['admin/promo/edit/(:num)']       = 'promo/edit/$1';
$route['admin/promo/update/(:num)']     = 'promo/update/$1';
$route['admin/promo/delete/(:num)']     = 'promo/delete/$1';






