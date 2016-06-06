<?php
/**
 * 入口文件
 */

error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
define('APP_PATH', ROOT_PATH.'/app');
define('FRAMEWORK_PATH', ROOT_PATH.'/framework');

require_once(APP_PATH . '/config/config.php');
require_once(FRAMEWORK_PATH.'/classload.php');

Classload::autoloadRegiest();

//$product = new Product();
//$product->getPrice();

//$dispatch  = new Dispatch();
//$dispatch->match();

App::getInstance()->run();