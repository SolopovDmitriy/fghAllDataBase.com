<?php


namespace MyApp;


class PostStatusModel extends DBEngine
{
    public function __construct()
    {
        parent::__construct('poststatuses');
    }
}