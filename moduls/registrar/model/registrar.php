<?php
class RegistrarUser {


    public static function set_guardar() {
			    
			    DataBase::insertar('insert into USUARIS (nom, cognoms, login, password, is_actiu,email) values ("'.$_POST["nombre"].'","'.$_POST["apellidos"].'","'.$_POST["usuario"].'","'.$_POST["password"].'","1","'.$_POST["email"].'")');
			    
			    $datos_usuarios = DataBase::consulta('select * from USUARIS WHERE login = "'.$_POST["usuario"].'" and password = "'.$_POST["password"].'"');  
			    
			    //pd('select * from USUARIS WHERE login = "'.$_POST["usuario"].'" and password = "'.$_POST["password"].'"');
			    $_SESSION["user_login"]=$datos_usuarios[0];
    }
    
    public static function getUser() {
	    	
	    	
			
			  $data = DataBase::consulta('SELECT * FROM `USUARIS` WHERE `login` = "'.$_POST["usuario"].'"');
			  return $data;
			  
	}

}