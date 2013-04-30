<?php

require_once 'model/vols.php';
require_once 'view.php';
require_once 'application/controllers/general.php';

class Vols {

    public function action_default(){

        vista_template_vols();

    }

    public function action_view($tipo, $product){


        if($product==""){//por si no hay producto
            Redirect::to(APP.'/vols');
        }

        vista_template_product_vols($tipo, $product);

    }

    public function action_buy($tipo, $product){


        if($product==""){//por si no hay producto

            Redirect::to(APP.'/vols');

        }

        if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]!=false){

            vista_buy_vols($tipo, $product, "revise");

        }else{

            if($_POST["nombre"] && $_POST["apellido"] & $_POST["email"]){

                $data= array(

                    "nombre"    => $_POST["nombre"],
                    "apellido"  => $_POST["apellido"],
                    "email"     => $_POST["email"]

                    );

                Register::set_user("simple", $data, $tipo, $product);//Enviar la informacion, para no tener que volver a pasar por aqui

            }else{

                vista_buy_vols($tipo, $product, "register");

            }

        }

    }

}
