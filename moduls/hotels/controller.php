<?php

require_once 'model/hotels.php';
require_once 'view.php';
require_once 'application/controllers/general.php';

class Hotels {

    public function action_default(){

        vista_template_hotels();

    }

    public function action_view($tipo, $product){


        if($product==""){//por si no hay producto
            Redirect::to(APP.'/hotels');
        }

        vista_template_product_hotels($tipo, $product);

    }

}
