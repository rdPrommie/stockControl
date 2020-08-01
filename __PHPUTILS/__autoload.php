<?php

session_start();
define('PUBLIC_HTML', dirname(__DIR__) . '/');
define('TPL_FOLDER', PUBLIC_HTML . 'tpl/');
define('PHP_FOLDER', PUBLIC_HTML . 'php/');
define('PHPUTILS', PUBLIC_HTML . "__PHPUTILS/");


define('ADMIN_PW', "PrOm2311!");

require_once dirname(__DIR__) . '/__PHPUTILS/autoload.common.class.php';
AutoLoadCommon::alapFajlokBetoltese();


//error_reporting(E_ALL);
//ini_set("display_errors", 1);