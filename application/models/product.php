<?php

require_once 'application/controllers/general.php';

class Product {


    public static function get_home($option) {

        $datos = DataBase::consulta("select * from ".$option." limit 4");
        return $datos;

    }

    public static function get($option) {

        $datos = DataBase::consulta("select * from ".$option);
        return $datos;

    }

    public static function get_product($option, $id_producto) {

        $datos = DataBase::consulta("select * from ".$option." where id = ".$id_producto);
        return $datos;

    }


}