<?php


namespace MyApp;


class Router
{
    private $defaultControllerName = __NAMESPACE__ . '\\' . 'MainController';
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

        //controller check ------------------------------------start
        if (empty($routes[1])) { //доступ в корень
            $this->controllerName = $this->defaultControllerName; //maincontroller default
        } else {
            //обработка кастомных маршрутов
            $this->controllerName = ucfirst(mb_strtolower($routes[1]))."Controller";
            if(file_exists(CONTROLLERS_PATH.$this->controllerName.EXT)){
                //если
                $this->controllerName =  __NAMESPACE__."\\".$this->controllerName;
            } else {
                $this->controllerName = $this->errorControllerName;
            }
        }
        $this->controller = new $this->controllerName(); //создали экземпляр контроллера
        //controller check ------------------------------------end

        //action check ------------------------------------start
        $this->actionName = $this->defaultActionName;
        if(!empty($routes[2])) {
            $routes[2] = mb_strtolower($routes[2]);
            if(method_exists($this->controller, $routes[2])) {
                $this->actionName = $routes[2];
            }
        }
        $this->controller->call($this->actionName); //
        //action check ------------------------------------end
    }
}