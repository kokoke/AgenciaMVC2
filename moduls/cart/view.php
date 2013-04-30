<?php

/*Plantilla de index*/



function vistaCart () {

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
    $html = str_replace('{Titulo}', "Carrito", $html);//Por retocar
    $html = str_replace('{ShopCart}', vista_cart(), $html);//Por retocar


    $html = General::actionViewCart($html);//Por retocar

    //DUDADAAAAAAAA
    $html = str_replace('{formularioTop}', General::action_form(), $html);//en medio
    $html = str_replace('{topNav}', General::action_topNav(), $html);
    $html = str_replace('{formularioTop}', General::action_form(), $html);

    $html = getSecctionCart($html);

    $html = str_replace('{Producto}', General::action_get_product_alone("cart"), $html);//Por retocar

    print $html;

}


function getSecctionCart($html){

    $html = str_replace('{sectionHome}', '', $html);
    $html = str_replace('{sectionVols}', '', $html);
    $html = str_replace('{sectionHotels}', '', $html);
    $html = str_replace('{sectionOfertes}', '', $html);
    $html = str_replace('{sectionCarrito}', 'class="secction"', $html);


    return $html;

}