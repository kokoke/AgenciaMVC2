<?php

class Config {

    public static function get($what)
    {

        $config = require '../../application/config/application.php';
        return $config[$what];
        pd($_SERVER);
    }
}
