<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define( 'LOGIN', FATHER_BASE.'login/index/' );
define( 'LOGIN_POST', FATHER_BASE.'login/login_post/' );
define( 'LOGOUT', FATHER_BASE.'login/logout/' );
/* RESTAURANT URLS */
define( 'RESTAURANT_LIST', FATHER_BASE.'restaurant/restaurant_list/' );
define( 'ADD_RESTAURANT', FATHER_BASE.'restaurant/add_restaurant/' );
define( 'ADD_RESTAURANT_POST', FATHER_BASE.'restaurant/add_restaurant_post/' );
define( 'UPDATE_RESTAURANT', FATHER_BASE.'restaurant/update_restaurant/' );
define( 'UPDATE_RESTAURANT_POST', FATHER_BASE.'restaurant/update_restaurant_post/' );
define( 'DELETE_RESTAURANT', FATHER_BASE.'restaurant/delete_restaurant/' );

define( 'RESTAURANT_PROFILE', FATHER_BASE.'restaurant/restaurant_profile/' );
/* RESTAURANT URLS */


define( 'MENU_LIST', FATHER_BASE.'menus/menus_list/' );
define( 'ADD_MENU', FATHER_BASE.'menus/add_menu/' );
define( 'ADD_MENU_POST', FATHER_BASE.'menus/add_menu_post/' );
define( 'UPDATE_MENU', FATHER_BASE.'menus/update_menu/' );
define( 'UPDATE_MENU_POST', FATHER_BASE.'menus/update_menu_post/' );
define( 'DELETE_MENU', FATHER_BASE.'menus/delete_menu/' );
define( 'HIDE_MENU', FATHER_BASE.'menus/hide_menu/' );

define( 'CATEGORY_LIST', FATHER_BASE.'category/category_list/' );
define( 'ADD_CATEGORY', FATHER_BASE.'category/add_category/' );
define( 'ADD_CATEGORY_POST', FATHER_BASE.'category/add_category_post/' );
define( 'UPDATE_CATEGORY', FATHER_BASE.'category/update_category/' );
define( 'UPDATE_CATEGORY_POST', FATHER_BASE.'category/update_category_post/' );
define( 'DELETE_CATEGORY', FATHER_BASE.'category/delete_category/' );
define( 'HIDE_CATEGORY', FATHER_BASE.'category/hide_category/' );

define( 'FOOD_LIST', FATHER_BASE.'foods/food_list/' );
define( 'ADD_FOOD', FATHER_BASE.'foods/add_food/' );
define( 'ADD_FOOD_POST', FATHER_BASE.'foods/add_food_post/' );
define( 'UPDATE_FOOD', FATHER_BASE.'foods/update_food/' );
define( 'UPDATE_FOOD_POST', FATHER_BASE.'foods/update_food_post/' );
define( 'DELETE_FOOD', FATHER_BASE.'foods/delete_food/' );
define( 'HIDE_FOOD', FATHER_BASE.'foods/hide_food/' );

define( 'PRODUCT_LIST', FATHER_BASE.'product/product_list/' );
define( 'ADD_PRODUCT', FATHER_BASE.'product/add_product/' );
define( 'ADD_PRODUCT_POST', FATHER_BASE.'product/add_product_post/' );
define( 'UPDATE_PRODUCT', FATHER_BASE.'product/update_product/' );
define( 'UPDATE_PRODUCT_POST', FATHER_BASE.'product/update_product_post/' );
define( 'DELETE_PRODUCT', FATHER_BASE.'product/delete_product/' );
define( 'HIDE_PRODUCT', FATHER_BASE.'product/hide_product/' );

define( 'PAGE_LIST', FATHER_BASE.'page/page_list/' );
define( 'ADD_PAGE', FATHER_BASE.'page/add_page/' );
define( 'ADD_PAGE_POST', FATHER_BASE.'page/add_page_post/' );
define( 'UPDATE_PAGE', FATHER_BASE.'page/update_page/' );
define( 'UPDATE_PAGE_POST', FATHER_BASE.'page/update_page_post/' );
define( 'DELETE_PAGE', FATHER_BASE.'page/delete_page/' );
define( 'HIDE_PAGE', FATHER_BASE.'page/hide_page/' );

define( 'SOCIAL_MEDIA_LIST', FATHER_BASE.'social_media/social_media_list/' );
define( 'ADD_SOCIAL_MEDIA', FATHER_BASE.'social_media/add_social_media/' );
define( 'ADD_SOCIAL_MEDIA_POST', FATHER_BASE.'social_media/add_social_media_post/' );
define( 'UPDATE_SOCIAL_MEDIA', FATHER_BASE.'social_media/update_social_media/' );
define( 'UPDATE_SOCIAL_MEDIA_POST', FATHER_BASE.'social_media/update_social_media_post/' );
define( 'DELETE_SOCIAL_MEDIA', FATHER_BASE.'social_media/delete_social_media/' );
define( 'HIDE_SOCIAL_MEDIA', FATHER_BASE.'social_media/hide_social_media/' );

define( 'BANNER_LIST', FATHER_BASE.'banner/banner_list/' );
define( 'ADD_BANNER', FATHER_BASE.'banner/add_banner/' );
define( 'ADD_BANNER_POST', FATHER_BASE.'banner/add_banner_post/' );
define( 'UPDATE_BANNER', FATHER_BASE.'banner/update_banner/' );
define( 'UPDATE_BANNER_POST', FATHER_BASE.'banner/update_banner_post/' );
define( 'DELETE_BANNER', FATHER_BASE.'banner/delete_banner/' );
define( 'HIDE_BANNER', FATHER_BASE.'banner/hide_banner/' );


define( 'UPLOAD_EXCEL', FATHER_BASE.'excel/index/' );
define( 'UPLOAD_EXCEL_POST', FATHER_BASE.'excel/upload_file/' );
