<?php

/**
 * FUNCIONES GENERALES QUE UTILIZAN TODOS LOS MODULOS
 */



function get_template_ini(){

    $file = 'site_media/html/template.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_header(){

    $file = 'site_media/html/header.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_cart(){

    $file = 'site_media/html/pages/cart/listCart/showCart.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_cartList(){

    $file = 'site_media/html/pages/cart/listCart/productCart.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_topNav($action){

    $file = 'site_media/html/pages/nav/nav_'.$action.'.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_nav(){

    $file = 'site_media/html/nav.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_slider(){

    $file = 'site_media/html/slider.html';
    $template = file_get_contents($file);
    return $template;

}

function background_header(){

    $file = 'site_media/html/background_header.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_home(){

    $file = 'site_media/html/home.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_footer(){

    $file = 'site_media/html/footer.html';
    $template = file_get_contents($file);
    return $template;

}



function vista_form ($op) {

    $html = get_template_form($op);
    if($op=="output")
        $html = str_replace('{user}', $_SESSION["user_login"]["nom"], $html);

    return $html;

}

function get_register(){

    $file = 'site_media/html/pages/buy/register.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_register($tipo, $product){

    $html = get_register();
    return $html;

}

function get_revise($accion){

    $file = 'site_media/html/pages/buy/'.$accion.'.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_revise($tipo, $product, $accion){

    $html = get_revise($accion);
    return $html;

}




function page(){

    $file = 'site_media/html/pages/page.html';
    $template = file_get_contents($file);
    return $template;

}

/*optiene el formulario de inicio o fin de sesion*/
function get_template_form($op) {

    $file = 'site_media/html/login_'.$op.'.php';
    $template = file_get_contents($file);
    return $template;

}

function get_template_product($template) {

    $file = 'site_media/html/nov_'.strtolower($template).'.html';
    $template = file_get_contents($file);
    return $template;

}

function vista_product($data=array(), $op, $secction){
    
    $cod_html = "";

    if(count($data)) {
        foreach ($data as $value) {
            /**
             * Si no lo pongo dentro, unicamente muestra los valores del ultimo
             */
            switch ($secction) {
                case 'home':
                    $html = get_template_product($op);
                break;

                case 'detall':
                    $html = get_template_product_alone($op);
                break;

                case 'product':
                    $html = get_template_product_single($op);
                break;
            }

            //pd($data);

            /*CADA TABLA TIENE SUS CAMPOS*/
            if($op == "VOLS" || $op == "vols"){

                $html = str_replace('{dia_vol}', $value['data_vol'], $html);
                $html = str_replace('{pla_vol}', $value['n_places'], $html);
                $html = str_replace('{pre_c}', $value['preu_turist'], $html);
                $html = str_replace('{pre_p}', $value['preu_primera'], $html);
                $html = str_replace('{nom_producto}', '', $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/vols/view/'.$value['id'].'"', $html);
                $html = str_replace('{url_buy_product}', 'href="'.APP.'/vols/buy/'.$value['id'].'"', $html);
                $html = str_replace('{addVol}', 'href="'.APP.'/cart/add/vols?id='.$value['id'].'"', $html);//Por retocar
                $html = str_replace('{imgProduct}', $value['img'], $html);

            } elseif ($op == "HOTELS" || $op == "hotels") {

                $html = str_replace('{nombre_hotel}', $value['nom'], $html);
                $html = str_replace('{plazas_hotel}', $value['n_places'], $html);
                $html = str_replace('{precio_hotel}', $value['preu_base'], $html);
                $html = str_replace('{Titulo}', $value['nom'], $html);
                $html = str_replace('{nom_producto}', $value['nom'], $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/hotels/view/'.$value['id'].'"', $html);
                $html = str_replace('{descipt}', $value['descripcion'], $html);
                $html = str_replace('{direc}', $value['direccion'], $html);
                $html = str_replace('{estrellas}', $value['estrellas'], $html);
                $html = str_replace('{addHotel}', 'href="'.APP.'/cart/add/hotels?id='.$value['id'].'"', $html);//Por retocar
                $html = str_replace('{imgProduct}', $value['img'], $html);//Por retocar
                $html = str_replace('{valueX}', 'value="'.$value['x'].'"', $html);
                $html = str_replace('{valueY}', 'value="'.$value['y'].'"', $html);

            } elseif ($op == "OFERTES" || $op == "ofertes") {

                $html = str_replace('{Titulo}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{nom_producto}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{nombre_oferta}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{fech_fin}', $value['dataFin'], $html);
                $html = str_replace('{fech_ini}', $value['dataIni'], $html);
                $html = str_replace('{precio}', $value['n_places'], $html);
                $html = str_replace('{nom_producto}', $value['desc_oferta'], $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/ofertes/view/'.$value['id'].'"', $html);
                $html = str_replace('{addOferta}', 'href="'.APP.'/cart/add/ofertes?id='.$value['id'].'"', $html);//Por retocar
                $html = str_replace('{imgProduct}', $value['img'], $html);
            }

            $cod_html = $cod_html ."". $html;
            

        }

    } else {

        $cod_html = get_template_product_error();
        $cod_html = str_replace('{url}', ucfirst($op), $cod_html);
        //$cod_html = render_dinamic_data($cod_html, $data);

    }

    return $cod_html;

}

function vistaCartList($data=array()){

    //pd($data);

    if(count($data)>0) {
        foreach ($data as $value) {
            /**
             * Si no lo pongo dentro, unicamente muestra los valores del ultimo
             */
            //pd($value);

            $html = get_template_product_alone($value["section"]);


            /*CADA TABLA TIENE SUS CAMPOS*/
            if($value["section"] == "vols"){

                $html = str_replace('{dia_vol}', $value['data_vol'], $html);
                $html = str_replace('{pla_vol}', $value['n_places'], $html);
                $html = str_replace('{pre_c}', $value['preu_turist'], $html);
                $html = str_replace('{pre_p}', $value['preu_primera'], $html);
                $html = str_replace('{nom_producto}', $value['nom'], $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/vols/view/'.$value['id'].'"', $html);
                $html = str_replace('{url_buy_product}', 'href="'.APP.'/vols/buy/'.$value['id'].'"', $html);
                $html = str_replace('{addVol}', 'href="'.APP.'/cart/add/vols?id='.$value['id'].'"', $html);//Por retocar


            } elseif ($value["section"] == "hotels") {

                pd($value);

                $html = str_replace('{nombre_hotel}', $value['nom'], $html);
                $html = str_replace('{plazas_hotel}', $value['n_places'], $html);
                $html = str_replace('{precio_hotel}', $value['preu_base'], $html);
                $html = str_replace('{Titulo}', $value['nom'], $html);
                $html = str_replace('{nom_producto}', $value['nom'], $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/hotels/view/'.$value['id'].'"', $html);
                $html = str_replace('{descipt}', $value['descripcion'], $html);


                $html = str_replace('{direc}', $value['direccion'], $html);
                $html = str_replace('{estrellas}', $value['estrellas'], $html);
                $html = str_replace('{addHotel}', 'href="'.APP.'/cart/add/hotels?id='.$value['id'].'"', $html);//Por retocar

            } elseif ($value["section"] == "ofertes") {

                $html = str_replace('{Titulo}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{nom_producto}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{nombre_oferta}', ucfirst($value['desc_oferta']), $html);
                $html = str_replace('{fech_fin}', $value['dataFin'], $html);
                $html = str_replace('{fech_ini}', $value['dataIni'], $html);
                $html = str_replace('{precio}', $value['n_places'], $html);
                $html = str_replace('{nom_producto}', $value['nom'], $html);
                $html = str_replace('{url}', ucfirst($op), $html);
                $html = str_replace('{url_product}', 'href="'.APP.'/ofertes/view/'.$value['id'].'"', $html);
                $html = str_replace('{addOferta}', 'href="'.APP.'/cart/add/ofertes?id='.$value['id'].'"', $html);//Por retocar
            }

            $cod_html = $cod_html."".$html;
            

        }

        //$cod_html = render_dinamic_data($cod_html, $data);

    } else {

        $cod_html = get_template_product_Stock();
        $cod_html = str_replace('{url}', ucfirst($value["section"]), $cod_html);
        //$cod_html = render_dinamic_data($cod_html, $data);

    }

    return $cod_html;

}

function get_template_product_alone($opcion) {

    $file = 'site_media/html/pages/list_product/'.$opcion.'.html';
    $template = file_get_contents($file);
    return $template;

}


function get_template_product_single ($tipo){

    $file = 'site_media/html/pages/'.$tipo.'/template_'.$tipo.'.html';
    $template = file_get_contents($file);
    return $template;

}


function get_template_product_error(){

    $file = 'site_media/html/pages/notfound.html';
    $template = file_get_contents($file);
    return $template;

}

function get_template_product_Stock(){

    $file = 'site_media/html/pages/cart/product.html';
    $template = file_get_contents($file);
    return $template;

}