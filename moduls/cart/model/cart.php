<?php

require_once 'moduls/cart/controller.php';
require_once 'core/DBConf.php';

class addCart {


    public static function get($action) {

        $data = DataBase::consulta('select * from '.$action.' WHERE id = "'.$_GET["id"].'"');



        return count($data) > 0
               ? $data
               : false;

    }

}