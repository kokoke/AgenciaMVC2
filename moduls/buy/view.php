<?php

function vistaBuy($action) {

    $html = get_template_ini();
    /*Para coger html basicos, sin controlar nada*/
    $html = str_replace('{cabecera}', vista_header(), $html);//Por retocar
    $html = str_replace('{navigation}', vista_nav(), $html);//Por retocar, Controller para cuando inicie sesion poner otros elementos
    $html = str_replace('{slider}', background_header(), $html);//Por retocar


    if(isset($_SESSION["carrito"])){
	    if (sizeof($_SESSION["carrito"]) == 0) {
	        $html = str_replace('{constructor}', vistaBuyAction(), $html);
	    } else {
	        $html = str_replace('{constructor}', VistaBuyRegister(), $html);
	    }
	 }else {
		 $html = str_replace('{constructor}', vistaBuyAction(), $html);
	 }
        
    
    $html = str_replace('{URLCSS}'		, 'href="'.APP.'/site_media/css/styles.css"'	, $html);
    $html = str_replace('{URLSCRIPT}'	, 'src="'.APP.'/site_media/js/script.js"'		, $html);
    $html = str_replace('{URLJQUERY}'	, 'src="'.APP.'/site_media/js/jquery.js"'		, $html);
    
    

    $html = str_replace('{footer}', vista_footer(), $html);
    //$html = str_replace('{constructor}', vista_home(), $html);//Por retocar

    $html = str_replace('{ShopCart}', vista_cart(), $html);//Por retocar
    $html = General::actionViewCart($html);//Por retocar

    $html = str_replace('{formularioTop}', General::action_form(), $html);//en medio
    $html = str_replace('{topNav}', General::action_topNav(), $html);
    $html = str_replace('{formularioTop}', General::action_form(), $html);//en medio

    print $html;
}

function vistaBuyAction () {

    $file = 'site_media/html/pages/buy/revise.html';
    $template = file_get_contents($file);
    return $template;

}

function VistaBuyRegister () {
    $file = 'site_media/html/pages/buy/register.html';
    $template = file_get_contents($file);
    return $template;
}
