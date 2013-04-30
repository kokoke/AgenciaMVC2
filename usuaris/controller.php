<?php
require_once('constants.php');
require_once('model.php');
require_once('view.php');

function handler() {
    $event = VIEW_GET_USER;
    $uri = $_SERVER['REQUEST_URI'];
    $peticions = array(SET_USER, GET_USER, DELETE_USER, EDIT_USER,
                        VIEW_SET_USER, VIEW_GET_USER, VIEW_DELETE_USER, 
                        VIEW_EDIT_USER);
    foreach ($peticions as $peticion) {
        $uri_peticion = MODUL.$peticion.'/';
        if( strpos($uri, $uri_peticion) == true ) {
            $event = $peticion;
        }
    }

    $user_data = helper_user_data();
    $usuari = set_obj();

    switch ($event) {
        case SET_USER:
            $usuari->set($user_data);
            $data = array('missatge'=>$usuari->missatge);
            retornar_vista(VIEW_SET_USER, $data);
            break;
        case GET_USER:
            $usuari->get($user_data);
            $data = array(
                'nom'=>$usuari->nom,
                'cognoms'=>$usuari->cognoms,
                'email'=>$usuari->email,
                'login'=>$usuari->login,
            );
            retornar_vista(VIEW_EDIT_USER, $data);
            break;
        case DELETE_USER:
            $usuari->delete($user_data['email']);
            $data = array('missatge'=>$usuari->missatge);
            retornar_vista(VIEW_DELETE_USER, $data);
            break;
        case EDIT_USER:
            $usuari->edit($user_data);
            $data = array('missatge'=>$usuari->missatge);
            retornar_vista(VIEW_GET_USER, $data);
            break;
        default:
            retornar_vista($event);
    }
}


function set_obj() {
    $obj = new Usuari();
    return $obj;
}

function helper_user_data() {
    $user_data = array();
    if($_POST) {
        if(array_key_exists('nom', $_POST)) { 
            $user_data['nom'] = $_POST['nom']; 
        }
        if(array_key_exists('cognoms', $_POST)) { 
            $user_data['cognoms'] = $_POST['cognoms']; 
        }
        if(array_key_exists('email', $_POST)) { 
            $user_data['email'] = $_POST['email']; 
        }
        if(array_key_exists('login', $_POST)) { 
            $user_data['login'] = $_POST['login']; 
        }
        if(array_key_exists('passwd', $_POST)) { 
            $user_data['passwd'] = $_POST['passwd']; 
        }
    } else if($_GET) {
        if(array_key_exists('email', $_GET)) {
            $user_data = $_GET['email'];
        }
    }
    return $user_data;
}


handler();
?>
