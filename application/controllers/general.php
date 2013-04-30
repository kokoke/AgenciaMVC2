<?php

//pd($_SERVER);
require_once 'application/models/login.php';
require_once 'application/models/product.php';
require_once 'application/models/register.php';
require_once 'application/view/view_default.php';


class General {

    function action_form(){

        if(isset($_POST['usuario'])!="" && isset($_POST['passwd'])!=""){

            $datos_usuario = array(
                'email'    => $_POST['usuario'],
                'password' => $_POST['passwd']
            );

            $user = Login::get($datos_usuario);

            $_SESSION["user_login"] = ($user) ? $user[0] : false;


        }

        if(isset($_POST["logout"])){unset($_SESSION["user_login"]);}


            if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]!=false){

                $html = vista_form("output");

            } else {
                $html = vista_topNav("default");
                $html = vista_form("input");

            }

            return $html;

    }

    public function action_topNav(){

        if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]!=false){

            $html = vista_topNav("login");

        } else {

            $html = vista_topNav("default");

        }

        return $html;

    }

    public function action_get_product($op){
    
            $data = Product::get_home($op);
            $html = vista_product($data, $op, 'home');
            return $html;

    }

    public function action_get_product_alone($op){

        if($op=="cart"){
            $data = $_SESSION["carrito"];
            $html = vistaCartList($data);
        }else{
            $data = Product::get($op);
            $html = vista_product($data, $op, 'detall');
        }
        return $html;

    }

    public function action_get($op, $producto){

        $data = Product::get_product($op, $producto);
        $html = vista_product($data, $op,'product');
        return $html;

    }

    public function action_buy($op, $producto){

        $data = Product::get_product($op, $producto);

        if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]!=false){

                $html = vista_revise($op, $producto,"revise");

            } else {

                $html = vista_revise($op, $producto,"register");

            }


        //$html = vista_revise($data, $op, $accion);
        return $html;

    }

    public function action_logout(){
        unset($_SESSION["user_login"]);
        Redirect::to_prev();
    }

    public function actionViewCart($codigo){


        $height = null;
        $precioCalculado = 0;
        $codigo_html ="";
        
        if((isset($_SESSION['carrito']) || !empty($_SESSION['carrito']) ) && count($_SESSION['carrito']) > 0){
            $height = count($_SESSION["carrito"]);

            //pd($_SESSION["carrito"]);
            $codigo = str_replace('{Cantidad}', $height, $codigo);

                foreach ($_SESSION["carrito"] as $value) {

                    $html = vista_cartList();
                    //pd($value);
                    if($value["section"] == "ofertes" ){

                        $html = str_replace('{cantidadProduct}', $value["cantidad"], $html);
                        $html = str_replace('{nombreProduct}', $value["desc_oferta"], $html);
                        $html = str_replace('{precioProduct}', $value["precio"], $html);
                        $html = str_replace('{delProduct}', 'href="'.APP.'/cart/del/product?idArray='.$value["position"].'"', $html);

                        $precioCalculado = (float)$precioCalculado + (float)$value["precio"];

                    }elseif ($value["section"] == "hotels" ) {
                   

                        $html = str_replace('{cantidadProduct}', $value["cantidad"], $html);
                        $html = str_replace('{nombreProduct}', $value["nom"], $html);
                        $html = str_replace('{precioProduct}', $value["preu_base"], $html);
                        $html = str_replace('{delProduct}', 'href="'.APP.'/cart/del/product?idArray='.$value["position"].'"', $html);

                        $precioCalculado = (float)$precioCalculado + (float)$value["preu_base"];

                    }elseif ($value["section"] == "vols" ) {

                        $html = str_replace('{cantidadProduct}', $value["cantidad"], $html);
                        $html = str_replace('{nombreProduct}', $value["destino"], $html);
                        $html = str_replace('{precioProduct}', $value["preu_turist"], $html);
                        $html = str_replace('{delProduct}', 'href="'.APP.'/cart/del/product?idArray='.$value["position"].'"', $html);

                        $precioCalculado = (float)$precioCalculado + (float)$value["preu_turist"];

                    }

                    $codigo_html = $codigo_html ."". $html;
                    //pd($codigo_html);

                }
                //pd($codigo_html);
                $precioCalculadoIVA = ((float)$precioCalculado * (float)0.21);



        }else {

            $precioCalculadoIVA = 0 ;
            $height = "Vacio";
            $html = vista_cartList();
            $html = str_replace('{cantidadProduct}', "", $html);
            $html = str_replace('{nombreProduct}',"Sin productos" , $html);
            $html = str_replace('{precioProduct}', "", $html);
            $codigo_html =  $html;

        }

        //$codigo = $codigo ."". $codigo_html;

        $codigo = str_replace('{Cantidad}', $height, $codigo);
        $codigo = str_replace('{eliminarCart}', 'href="'.APP.'/cart/delete"', $codigo);

        $codigo = str_replace('{ProductCart}', $codigo_html, $codigo);
        $codigo = str_replace('{PrecioTransporte}', "0.00€", $codigo);
        $codigo = str_replace('{PrecioIva}', $precioCalculadoIVA, $codigo);
        $codigo = str_replace('{PrecioTotal}', $precioCalculado, $codigo);



        return $codigo;

    }

}
