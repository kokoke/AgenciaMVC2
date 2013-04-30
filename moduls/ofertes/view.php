<?php

require_once 'application/view/view_default.php';

function vista_template_vols () {

    $html = get_template_ini();
    /*Para coger html basicos, sin controlar nada*/

    $html = str_replace('{cabecera}', vista_header(), $html);//Por retocar
    $html = str_replace('{navigation}', vista_nav(), $html);//Por retocar, Controller para cuando inicie sesion poner otros elementos
    $html = str_replace('{slider}', background_header(), $html);//Por retocar
    $html = str_replace('{constructor}', page(), $html);//Por retocar
    $html = str_replace('{footer}', vista_footer(), $html);
    
    
    
    $html = str_replace('{URLCSS}'		, 'href="'.APP.'/site_media/css/styles.css"'	, $html);
    $html = str_replace('{URLSCRIPT}'	, 'src="'.APP.'/site_media/js/script.js"'		, $html);
    $html = str_replace('{URLJQUERY}'	, 'src="'.APP.'/site_media/js/jquery.js"'		, $html);
    
    

    $html = str_replace('{url}', $_SESSION['page'], $html);//Por retocar
    $html = str_replace('{Titulo}', "Ofertas", $html);//Por retocar
    $html = str_replace('{Producto}', General::action_get_product_alone("ofertes"), $html);//Por retocar
    $html = str_replace('{ShopCart}', vista_cart(), $html);//Por retocar


    $html = getSecctionVols($html);

    $html = General::actionViewCart($html);//Por retocar

    //DUDADAAAAAAAA
    $html = str_replace('{formularioTop}', General::action_form(), $html);//en medio
    $html = str_replace('{topNav}', General::action_topNav(), $html);
    $html = str_replace('{formularioTop}', General::action_form(), $html);


    print $html;

}

function getSecctionVols($html){

    $html = str_replace('{sectionHome}', '', $html);
    $html = str_replace('{sectionVols}', '', $html);
    $html = str_replace('{sectionHotels}', '', $html);
    $html = str_replace('{sectionOfertes}', 'class="secction"', $html);
    $html = str_replace('{sectionCarrito}', '', $html);

    return $html;

}

function vista_template_product_ofertes($tipo, $product){

    $html = get_template_ini();
    $html = str_replace('{cabecera}', vista_header(), $html);//Por retocar
    $html = str_replace('{navigation}', vista_nav(), $html);//Por retocar, Controller para cuando inicie sesion poner otros elementos
    $html = str_replace('{slider}', background_header(), $html);//Por retocar
    $html = str_replace('{url}', ucfirst($tipo[0]), $html);//Por retocar
    //$html = str_replace('{formulario}', General::action_form(), $html);
    $html = str_replace('{constructor}', General::action_get($tipo[0], $product), $html);//Por retocar
    $html = str_replace('{footer}', vista_footer(), $html);
    
    
    
    $html = str_replace('{URLCSS}'		, 'href="'.APP.'/site_media/css/styles.css"'	, $html);
    $html = str_replace('{URLSCRIPT}'	, 'src="'.APP.'/site_media/js/script.js"'		, $html);
    $html = str_replace('{URLJQUERY}'	, 'src="'.APP.'/site_media/js/jquery.js"'		, $html);
    
    

    $html = str_replace('{ShopCart}', vista_cart(), $html);//Por retocar


    $html = getSecctionVols($html);
    $html = General::actionViewCart($html);//Por retocar

    //DUDADAAAAAAAA
    $html = str_replace('{formularioTop}', General::action_form(), $html);//en medio
    $html = str_replace('{topNav}', General::action_topNav(), $html);
    $html = str_replace('{formularioTop}', General::action_form(), $html);


    print $html;

}