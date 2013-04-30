<?php

require_once 'moduls/home/controller.php';
require_once 'core/DBConf.php';

class Login {


    public static function get($data) {


        $datos_usuarios = DataBase::consulta('select * from USUARIS WHERE login = "'.$data['email'].'" and password = "'.$data['password'].'"');



        return count($datos_usuarios) > 0
               ? $datos_usuarios
               : false;

    }

}