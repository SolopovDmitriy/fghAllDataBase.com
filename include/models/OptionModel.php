<?php

namespace MyApp {
    class OptionModel extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('options');
        }
    }
}