<?php


namespace MyAdmApp {
    use MyApp\MethodExecuter as Mexec;
    class ErrorController extends Mexec
    {
        function index()
        {
            echo "errorController - index";
        }
    }
}