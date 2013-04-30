<?php

require_once 'model/cart.php';
require_once 'view.php';
require_once 'application/controllers/general.php';

class Cart {

    public function action_add($url, $action){
       $encontrado = false;
       $data =  addCart::get($action);
       $data[0]["section"]=$action;
       $position = 0;

       $x=0;

       if($data!=false){

            if(isset($_SESSION["carrito"]) && isset($_SESSION["carrito"])!=false){
                //pd($_SESSION["carrito"][1]["id"]);
                for($i=0;$i<=count($_SESSION["carrito"]);$i++){

                    if ($data[0]["id"] == $_SESSION["carrito"][$i]["id"]) {
                        if($data[0]["section"] == $_SESSION["carrito"][$i]["section"])
                        $encontrado = true;
                    }
                    if($data[0]["id"]=="" || !isset($data[0]["id"])){
                        $encontrado = true;//Para que no guarde unicamente la seccion
                    }
                    //echo $data[0]["id"]."==".$_SESSION["carrito"][$i]["id"]."<br>";
                }

                if (!$encontrado) {
                    $position = count($_SESSION["carrito"])+1;
                    $_SESSION["carrito"][$position] = $data[0];
                    $_SESSION["carrito"][$position]["cantidad"] = 1;
                    $_SESSION["carrito"][$position]["position"] = $position;
                }

            } else {
                if ($data[0]["id"]=="" || !isset($data[0]["id"])) {
                    $encontrado = true;//Para que no guarde unicamente la seccion
                }
                if (!$encontrado) {
                    $_SESSION["carrito"] = $data;
                    $_SESSION["carrito"][0]["cantidad"] = 1;
                    $_SESSION["carrito"][0]["position"] = $position ;
                }
            }

            //pd($_SESSION["carrito"]);

       } else {

            //Por si quiero mandar un mensaje de error

        }

        //pd($_SESSION["carrito"]);
        //unset($_SESSION["carrito"]);
        //pd($encontrado);
        //pd($x);
        //pd($_SESSION["carrito"]);
        //

        Redirect::to_prev();

    }

    public function action_del(){

        unset($_SESSION["carrito"][$_GET["idArray"]]);
        Redirect::to_prev();

    }

    public function action_delete(){

        unset($_SESSION["carrito"]);
        Redirect::to_prev();

    }

    public function action_view(){
        vistaCart();
    }
}