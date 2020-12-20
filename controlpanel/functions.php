<?php
if(ADM_DEVELOP_MODE == true) {
    function varSuperDump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}
function AutoLoadClasses($class_name)
{
    $directorys = array(
        ADM_CORE_PATH,
        ADM_CONTR_PATH,
        ADM_MODEL_PATH,
        CORE_PATH,
        MODELS_PATH
    );

    $class_name = explode('\\', $class_name);

    $class_name = $class_name[count($class_name) - 1];
    foreach ($directorys as $directory) {

        if (file_exists($directory.$class_name.".php")) {
            require_once($directory.$class_name.".php");
            return;
        }
    }
}

spl_autoload_register('AutoLoadClasses');