<?php
class Guardar {


    public static function set_reserva() {
	    
	    
	  	if(!isset($_SESSION["user_login"])){$usuario="anonimo";}else{$usuario=$_SESSION["user_login"]["id"];}
	    	    
	    foreach ($_SESSION["carrito"] as $value) {
		   
		     if($value["section"] == "vols"){
			    
			    
			    DataBase::insertar('insert into SERVEIS (usuari_id, vol_id) values ('.$usuario.','.$value["id"].' )');
			    
			    $consulta = DataBase::consulta('select * from VOLS where id="'.$value["id"].'"');
			    
			    $cantidad = $consulta[0]["n_places"];
			    $cantidad = $cantidad-1;
			    
			    DataBase::insertar('UPDATE VOLS SET n_places="'.$cantidad.'" where id="'.$value["id"].'"');
			    			  
			  
			  } else if($value["section"] == "hotels"){
			    
			    DataBase::insertar('insert into SERVEIS (usuari_id, hotel_id) values ('.$usuario.','.$value["id"].' )');
			    
			    $consulta = DataBase::consulta('select * from HOTELS where id="'.$value["id"].'"');
			    
			    $cantidad = $consulta[0]["n_places"];
			    $cantidad = $cantidad-1;
			    
			    DataBase::insertar('UPDATE HOTELS SET n_places="'.$cantidad.'" where id="'.$value["id"].'"');

			    
			  } else if($value["section"] == "ofertes"){
			    
			    DataBase::insertar('insert into SERVEIS (usuari_id, oferta_id) values ('.$usuario.','.$value["id"].' )');
			    
			    $consulta = DataBase::consulta('select * from OFERTES where id="'.$value["id"].'"');
			    
			    $cantidad = $consulta[0]["n_places"];
			    $cantidad = $cantidad-1;
			    
			    DataBase::insertar('UPDATE OFERTES SET n_places="'.$cantidad.'" where id="'.$value["id"].'"');

			    
			  }
		    
	    }
	    
	    unset($_SESSION["carrito"]);

    }

}