<?php

require_once 'model/ofertes.php';
require_once 'view.php';
require_once 'application/controllers/general.php';

class Ofertes {

    public function action_default(){

        vista_template_vols();

    }

    public function action_view($tipo, $product){


        if($product==""){//por si no hay producto
            Redirect::to(APP.'/ofertes');
        }

        vista_template_product_ofertes($tipo, $product);

    }
}
