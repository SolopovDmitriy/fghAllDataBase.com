<?php


namespace MyApp;


class View
{
    public static function Render($templateView, $contentView = null, $data = null) {
        require $templateView;
    }
    public static function RenderAdm($templateView="", $contentView = null, $moduls = [] , $data = null){
        require $templateView;
    }
}