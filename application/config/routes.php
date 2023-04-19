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
$route['regular-training'] = 'frontend/regular_training';
$route['alltraining'] = 'frontend/alltraining';
$route['upcoming-drives'] = 'frontend/upcoming_drive';
$route['auth/company'] = 'frontend/auth/company';

$route['auth/changepassword'] = 'frontend/auth/changepassword';
$route['auth/forget'] = 'frontend/auth/forget';

$route['auth/student/add'] = 'frontend/auth/student/add';
$route['auth/student'] = 'frontend/auth/student';
$route['auth/faculity'] = 'frontend/auth/faculity';
$route['user/dashboard'] = 'frontend/user/dashboard';
$route['user/driveapplication'] = 'frontend/user/driveapplication';
$route['user/student-application'] = 'frontend/user/allapplications';
$route['user/my-profile'] = 'frontend/user/myprofile';
$route['user/edit-profile'] = 'frontend/user/editprofile';
$route['user/forgetpassword'] = 'frontend/user/forgetpassword';




 //$route['admin/student'] = 'admin/student/studentinfomation';
$route['user/add-qualification'] = 'frontend/user/qualification';
$route['user/editqualification'] = 'frontend/user/editqualification';

$route['user/qualifications'] = 'frontend/user/allqualifications';
$route['user/add-drive'] = 'frontend/user/drives/adddrive';
$route['user/upcomming-drive'] = 'frontend/user/drives/upcommingdrive';
$route['user/pending-drive'] = 'frontend/user/drives/pendingdrive';
$route['user/cancel-drive'] = 'frontend/user/drives/canceldrive';

$route['user/complete-drive'] = 'frontend/user/drives/completedrive';
$route['user/rejected-drive'] = 'frontend/user/drives/rejecteddrive';
$route['user/drives/(:any)'] = 'frontend/user/drives/updatedrive/index/$1';

$route['drive/(:any)'] = 'frontend/drivedetails/index/$1';
$route['apply/(:any)'] = 'frontend/applydrive/index/$1';
$route['training/(:any)'] = 'frontend/courses/index/$1';
$route['training/(:any)/(:any)'] = 'frontend/regular_training/index/$1/$2';








$route['contact-us'] = 'frontend/contact';
$route['term-condition'] = 'frontend/term';
$route['privacy-policy'] = 'frontend/privacy';
$route['about-us'] = 'frontend/about';
$route['gallary'] = 'frontend/gallary';
$route['projects'] = 'frontend/project';
$route['clients'] = 'frontend/client';
$route['career'] = 'frontend/career';
$route['blogs'] = 'frontend/blog';
$route['feedback'] = 'frontend/feedback';
$route['blog/(:any)'] = 'frontend/blogsingle/index/$1';
$route['service'] = 'frontend/service';
$route['services/(:any)'] = 'frontend/servicedetail/index/$1';

$route['extra'] = 'frontend/extra';
$route['course_single'] = 'frontend/course_single';


 $route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;
