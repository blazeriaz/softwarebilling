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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'site/home';
$route['404_override'] = 'page_not_found/';
$route['translate_uri_dashes'] = TRUE;

//Admin

$route[SITE_ADMIN_URI] = 'admin/index';
$route[SITE_ADMIN_URI.'/logout'] = 'admin/logout';
$route[SITE_ADMIN_URI.'/forgotpassword'] = 'admin/forgot_password';
$route[SITE_ADMIN_URI.'/resetpassword/(:any)'] = 'admin/reset_password/$1';
$route[SITE_ADMIN_URI.'/changepassword'] = 'admin/change_password';
$route[SITE_ADMIN_URI.'/dashboard'] = 'admin/dashboard';
$route[SITE_ADMIN_URI.'/email_templates'] = 'admin/email_templates/index';
$route[SITE_ADMIN_URI.'/email_templates/(:num)'] = 'admin/email_templates/index/$1';
$route[SITE_ADMIN_URI.'/email_templates/edit/(:num)'] = 'admin/email_templates/edit/$1';

$route[SITE_ADMIN_URI.'/pnl_download/(:any)'] = 'admin/patient_note_list/download_document/$1';

// Front End

$route['login'] = 'site/login/index';
$route['register'] = 'site/login/register';
$route['email_verify/(:any)'] = 'site/login/email_verify/$1';
$route['change-password'] = 'site/change_password/index';
$route['login/forgotpassword'] = 'site/login/forgotpassword';
$route['login/actionforgotpassword'] = 'site/login/actionforgotpassword';
$route['success_forgot'] = 'site/login/success_forgot';
$route['reset_password'] = 'site/login/reset_password';
$route['action_reset_password'] = 'site/login/action_reset_password';
$route['logout'] = 'site/login/logout';

$route['home'] = 'site/home';
$route['my-profile'] = 'site/profile/index';
$route['my-courses'] = 'site/course/index';
$route['my-courses/(:any)'] = 'site/course/index/$1';
$route['my-purchase'] = 'site/purchase/index';

$route['faq'] = 'site/faq';
//$route['faq/index'] = 'site/faq/index';
$route['faq/faq_enquery'] = 'site/faq/faq_enquery';
$route['faq/(:any)'] = 'site/faq/index/$1';
$route['faq/(:any)/(:any)'] = 'site/faq/index/$1/$2';
$route['faq/(:any)/(:any)/(:any)'] = 'site/faq/index/$1/$2/$3';

$route['contact-us'] = 'site/contact_us';

$route['testimonial'] = 'site/testimonial/index';
//$route['testimonial/index'] = 'site/testimonial/index';
$route['testimonial/(:any)'] = 'site/testimonial/index/$1';
$route['testimonial/(:any)/(:any)'] = 'site/testimonial/index/$1/$2';
$route['testimonial/(:any)/(:any)/(:any)'] = 'site/testimonial/index/$1/$2/$3';

$route['blogs'] = 'site/blogs/index';
$route['blogs/detail/(:any)'] = 'site/blogs/detail/$1';
$route['blogs/detail/(:any)/(:any)'] = 'site/blogs/detail/$1/$2';
$route['blogs/(:any)'] = 'site/blogs/index/$1';
$route['blogs/(:any)/(:any)'] = 'site/blogs/index/$1/$2';
$route['blogs/(:any)/(:any)/(:any)'] = 'site/blogs/index/$1/$2/$3';

$route['youtube-channel'] = 'site/youtube-channel/index';
$route['youtube-channel/(:any)'] = 'site/youtube-channel/index/$1';

$route['careers'] = 'site/careers/index';
$route['careers/apply_job'] = 'site/careers/apply_job';
$route['careers/apply_job_valid'] = 'site/careers/apply_job_valid';
$route['careers/apply/(:any)'] = 'site/careers/apply/$1';
$route['careers/(:any)'] = 'site/careers/index/$1';

$route['cms/(:any)'] = 'site/cms/index/$1';
$route['about-us'] = 'site/cms/index/about-us';
$route['hard-copy'] = 'site/cms/index/hard-copy';
$route['why-target-usmle'] = 'site/cms/index/why-target-usmle';



$route['payment/success'] = 'site/payment/success';
$route['payment/cancel'] = 'site/payment/cancel';
$route['payment/error'] = 'site/payment/error';
$route['payment/process_payment'] = 'site/payment/process_payment';
$route['payment/ipin_process_payment'] = 'site/payment/ipin_process_payment';
$route['payment/(:any)'] = 'site/payment/index/$1';

$route['payment/(:any)/(:any)/(:any)'] = 'site/payment/payment_with_timeslot/$1/$2/$3';
$route['payment/(:any)/(:any)'] = 'site/payment/payment_livemock/$1/$2';

$route['cs-handbook'] = 'site/cs_handbook';
$route['ebook/(:any)'] = 'site/cs_handbook/book/$1';
$route['pdf-view/(:any)/(:any)'] = 'site/steps/view_pdf/$1/$2';
$route['cs-steps'] = 'site/steps/index/';
$route['cs-steps/(:any)'] = 'site/steps/index/$1';
$route['cs-steps/(:any)/(:any)'] = 'site/steps/index/$1/$2';
$route['online-tutorials'] = 'site/online_tutorial';
$route['patient-note-correction'] = 'site/patient_note_correction';
$route['patient-note-practise'] = 'site/patient_note_practise';
$route['personal-coaching'] = 'site/personal_coaching';
$route['personal-coaching/book-timeslot'] = 'site/personal_coaching/book_timeslot';
$route['mock-exam'] = 'site/online_mock_exam';
$route['online-mock-exam'] = 'site/online_mock_exam';
$route['live-mock-exam'] = 'site/live_mock_exam';
$route['book-timeslot'] = "site/book_timeslot";
$route['book-livemock'] = "site/book_timeslot/book_livemock";
$route['get_cities'] = 'site/login/cities';
$route['free-samples'] = 'site/home/download_free_samples';
$route['my-purchase/(:any)'] = 'site/purchase/index/$1';
$route['webinar'] = 'site/webinar';
$route['webinar/register'] = 'site/webinar/register';
$route['webinar-pay/(:any)'] = 'site/payment/webinar/$1';
