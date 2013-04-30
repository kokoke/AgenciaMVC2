<?php


    $url_actual = explode('index.php/', $_SERVER['PHP_SELF']);
    $url_actual = $url_actual[1];

    /*$url_actual  = explode('/', $url_actual);
    $controlador_actual = $url_actual[0]; // El ucfirst nos pone mayúsucula la primera letra
    $accion_actual      = 'action_' . $url_actual[1];*/




    if($url_actual == ""){
        require_once 'moduls/font_view/controller.php';
    }else{
        require_once 'moduls/'.$url_actual.'/controller.php';
    }

    Controller::template();



