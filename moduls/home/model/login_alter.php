<?php

require_once 'moduls/home/controller.php';
require_once 'core/DBConf.php';

class Login_s {


    public static function get($data) {


        $datos_usuarios = DataBase::consulta("select * from USUARIS ");

        foreach ($datos_usuarios as $value) {
            if($value["nom"]==$data["email"] && $value["password"] == $data["password"]){

                return $value;

            }
        }

        return false;

    }

}