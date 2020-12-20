<?php
session_start();

require_once "../config.php";
require_once "adminconfig".EXT;
require_once ADM_ABS_PATH."functions".EXT;

\MyAdmApp\UserAuth::userSessionCheck();

if(ADM_DEVELOP_MODE == true) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

try {
    MyAdmApp\Kernel::init();
} catch (Exception $exception){
    //логгирование
    echo $exception->getMessage();
}