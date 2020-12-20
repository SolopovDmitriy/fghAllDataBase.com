<?php


namespace MyAdmApp;


class Router
{
    private $defaultControllerName = __NAMESPACE__ . '\\' . 'AdminController';
    private $errorControllerName = __NAMESPACE__ . '\\' . 'ErrorController';
    private $defaultActionName = 'index';

    private $controllerName = null;
    private $actionName = null;

    public $controller = null;

    public function start()
    {

        $routes = explode("?", $_SERVER["REQUEST_URI"])[0];
        $routes = explode('/', $routes);


        //varSuperDump($routes);

        //      controller check ------------------------------------start
        if (empty($routes[2])) { //доступ в корень
            $this->controllerName = $this->defaultControllerName;
        } else {
            //обработка кастомных маршрутов
            $this->controllerName = ucfirst(mb_strtolower($routes[2]))."Controller";
            if(file_exists(ADM_CONTR_PATH.$this->controllerName.EXT)){
                //если
                $this->controllerName =  __NAMESPACE__."\\".$this->controllerName;
            } else {
                $this->controllerName = $this->errorControllerName;
            }
        }
        $this->controller = new $this->controllerName(); //создали экземпляр контроллера
        //controller check ------------------------------------end
        //varSuperDump($this->controller);
        //action check ------------------------------------start
        $this->actionName = $this->defaultActionName;
        if(!empty($routes[3])) {
            $routes[3] = mb_strtolower($routes[3]);
            if(method_exists($this->controller, $routes[3])) {
                $this->actionName = $routes[3];
            }
        }
        $this->controller->call($this->actionName); //
        //action check ------------------------------------end
    }
}