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
| URI contains no data. In the above example, the 'welcome' class
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
$route['designers/(:any)/(:num)'] = 'welcome/view_designers/$1/$2';
$route['designers'] = 'welcome/designers';
$route['test'] = 'Welcome/test';
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/page_404';
$route['translate_uri_dashes'] = FALSE;
$route['fabric/(:any)/(:num)'] = 'Welcome/shop/$2';
$route['careerdetails/(:num)'] = 'Welcome/careerdetails/$1';
$route['uniform/(:any)'] = 'Welcome/uniform_shop/$1';
$route['accessories/(:any)/(:any)'] = 'Welcome/accessories_shop/$1';
$route['altration/(:any)/(:any)'] = 'Welcome/altration/$1';
$route['bridal'] = 'Welcome/bridal';
$route['online-boutique/(:any)/(:any)'] = 'Welcome/online_boutique_shop/$1';
$route['how-it-works'] = 'Welcome/how_it_works';
$route['faq'] = 'Welcome/faq';
$route['blog'] = 'Welcome/blog';
$route['vendor-registration/(:num)'] = 'Vendor/vendor_registration/$1';
$route['vendor-registration'] = 'Vendor/vendor_registration';
$route['donate'] = 'Welcome/donate';
$route['login'] = 'Welcome/login';
$route['cancel-return'] = 'Welcome/return_page';
$route['payment'] = 'Welcome/payment';
$route['shipping'] = 'Welcome/shipping';
$route['privacy-policy'] = 'Welcome/privacypolicy';
$route['careers'] = 'Welcome/careers';
$route['brands'] = 'Welcome/brands';
$route['track-order'] = 'Welcome/track_order';
$route['measurement-guide'] = 'Welcome/measurement_guide';
$route['terms-and-condition'] = 'Welcome/termsandcondition';//index.php/Welcome/aboutus
$route['contact'] = 'Welcome/contact';
$route['about-us'] = 'Welcome/aboutus';
$route['featured-product'] = 'Welcome/featured_product';
$route['special-product'] = 'Welcome/special_product';
$route['recently-viewed'] = 'Welcome/recently_viewed';
$route['new-arrival-product'] = 'Welcome/newarrival_product';
$route['orders'] = 'Welcome/orders';
$route['vendor-faq'] = 'Vendor/vendorfaq';
$route['vendor-home'] = 'Vendor/vendor_home';
// $route['vendor/test'] = 'vendor/test';
$route['cancel-orders'] = 'Welcome/cancel_orders';
$route['manage-profile'] = 'Welcome/manage_profile';
$route['logout'] = 'Welcome/logout';
$route['stitching'] = 'Welcome/stitchcats';
$route['uniform'] = 'Welcome/unif';
$route['checkout'] = 'Welcome/checkout';
$route['tell-your-friend'] = 'Welcome/tellyourfriend';
$route['cart'] = 'Welcome/cart';
$route['orders/(:num)'] = 'Welcome/orders/$1';
$route['blog/(:num)'] = 'Welcome/blogview/$1';
$route['accessories'] = 'Welcome/acces';
$route['altration'] = 'Welcome/altr';
$route['more-services'] = 'Welcome/more_services';
$route['fabric'] = 'Welcome/fabric1';
$route['stitching/(:any)/(:any)'] = 'Welcome/custom/$1';
$route['(:num)/measurement-info'] = 'Welcome/measurement_info';
$route['measurement-info/(:any)/(:num)'] = 'Welcome/measurement_info/$1/$2';
$route['fabric/(:any)/(:any)/(:num)'] = 'Welcome/product';
$route['fabric/(:any)/(:any)/(:any)/(:num)'] = 'Welcome/product';
$route['bridal-appoinment'] = 'Welcome/bridal_appoinment';

$route['fabric/(:any)/(:any)/(:num)'] = 'Welcome/product';
$route['fabric/(:any)/(:any)/(:any)/(:num)'] = 'Welcome/product';

$route['accessories/(:any)/(:any)/(:num)'] = 'Welcome/acc_product';
$route['accessories/(:any)/(:any)/(:any)/(:num)'] = 'Welcome/acc_product';

$route['online-boutique/(:any)/(:any)/(:num)'] = 'Welcome/boutique_product';
$route['online-boutique/(:any)/(:any)/(:any)/(:num)'] = 'Welcome/boutique_product';

$route['uniform/(:any)/(:any)/(:num)'] = 'Welcome/uniform_product';
$route['uniform/(:any)/(:any)/(:any)/(:num)'] = 'Welcome/uniform_product';

$route['altration/(:any)/(:any)/(:num)'] = 'Welcome/altrationadd';
$route['more-services/(:any)/(:any)/(:num)'] = 'Welcome/moreservice_appoinment';
$route['more-services/(:any)/(:num)'] = 'Welcome/moreservice_appoinment';
//$route['vendor-registration'] = 'Vendor/vendor_registration';
