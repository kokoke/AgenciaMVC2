<?php

require_once 'moduls/home/controller.php';
require_once 'core/DBConf.php';

class Novedades {


    public static function get($option) {

        $datos_vuelos = DataBase::consulta("select * from ".$option);
        return $datos_vuelos;

    }



}
