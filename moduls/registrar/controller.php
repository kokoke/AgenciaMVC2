
<?php

require_once 'model/registrar.php';
require_once 'view.php';
require_once 'application/controllers/general.php';

class Registrar {

    public function action_default(){

       if(!isset($_SESSION["user_login"])){
	       
	       viewRegister();
	       
       }

    }
    
    public function action_guardar(){
	    
	    $data = RegistrarUser::getUser();
	    if(count($data)!=0 ){
		    Redirect::to("../registrar?error=1");
	    }else{
		    RegistrarUser::set_guardar();  
		    Redirect::to("../home");
	    }
	    
	    
    }
    
} 