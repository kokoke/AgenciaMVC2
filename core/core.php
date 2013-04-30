<?php


// URL's amigables
// Ahora que sabemos que todas las url's entrarán aquí si ntirar algún error gracias al
// .htaccess, analizamos la url que nos han pasado
require 'helpers.php';
require 'view.php';
require 'session.php';
require 'config.php';
require 'lang.php';
require 'DBConf.php';
require 'redirect.php';



/*Funciones de menu, cabecera, footer, navigation   */
require_once 'application/view/view_default.php';


// $_SERVER['PHP_SELF'] nos va a dar la url que queremos a partir de index.php/
$url_actual = explode('index.php/', $_SERVER['PHP_SELF']);


//pd(count($url_actual));

if(count($url_actual) == 1){ Redirect::to('home'); }


$_SESSION["page"]	=	ucfirst($url_actual[1]);
$url_actual  		= 	explode('/', $url_actual[1]);

//pd($url_actual);

$controlador_actual = (isset($url_actual[0]) and $url_actual[0] != '') ? $url_actual[0] : 'home';
$accion_actual      = (isset($url_actual[1]) and $url_actual[1]	!= '') ? 'action_' . $url_actual[1] : 'action_default';
$id_product         = (isset($url_actual[2]) and $url_actual[2] != '') ? $url_actual[2] : '';

require 'controller.php';

//pd($controlador_actual);
//pd($accion_actual);
//pd($id_product);

require 'moduls/'.$controlador_actual . '/controller.php';
$controlador_actual = ucfirst($url_actual[0]); // El ucfirst nos pone mayúsucula la primera letra

$controlador = new $controlador_actual;


if($accion_actual == 'action_view')
    $view = $controlador->$accion_actual($url_actual,$id_product); // Ya que esto nos devuelve el objeto vista
elseif($accion_actual == 'action_buy')
    $view = $controlador->$accion_actual($url_actual,$id_product);
elseif($accion_actual == 'action_add')
    $view = $controlador->$accion_actual($controlador_actual, $id_product);
else
    $view = $controlador->$accion_actual();

function __autoload($nombre_clase) {
    $modelo = substr($nombre_clase, 0, 6);

    if ($modelo == 'Model_') {
        require '../application/models/' . $nombre_clase . '.php';
    }


}

pd($controlador);

