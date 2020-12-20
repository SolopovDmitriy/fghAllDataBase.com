<?php
require_once "config.php";
require_once "functions.php";

use MyApp\DBConnector;
use MyApp\DBEngine;
use MyApp\OptionModel;
use MyApp\Kernel;

if(DEVELOP_MODE == true) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

try{
    Kernel::init();
}catch (Exception $exception){
    //логгирование
    echo $exception->getMessage();
}