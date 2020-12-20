<?php

function varSuperDump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function AutoLoadClasses($class_name)
{
    $directorys = array(
        CORE_PATH,
        MODELS_PATH,
        CONTROLLERS_PATH
    );
    $class_name = explode('\\', $class_name)[1];
    foreach ($directorys as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}

spl_autoload_register('AutoLoadClasses');