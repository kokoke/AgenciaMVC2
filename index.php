<?php session_start();

define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', realpath(dirname(__FILE__).DS));
define ('APP', dirname($_SERVER['SCRIPT_NAME']));


require_once 'core/core.php';




/**
 * boton recordar
 * pie de pagina
 * footer
 */