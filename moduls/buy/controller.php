<?php


require_once 'model/buy.php';
require_once 'view.php';
require_once 'application/controllers/general.php';



class Buy {

    public function action_default(){

        if(isset($_SESSION["user_login"])){
            vistaBuy("sessionStarted");
        } else {
            vistaBuy("sessionNotStarted");
        }

    }
    
    public function action_aceptar(){
	    
	    Guardar::set_reserva();
	    Redirect::to("../home");
	    
    }

}