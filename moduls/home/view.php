<?php


/*Plantilla de index*/

function vista_template () {

    $html = get_template_ini();
    
    $html = str_replace('{cabecera}'	, vista_header()	, $html);
    $html = str_replace('{navigation}'	, vista_nav()		, $html);
    $html = str_replace('{slider}'		, vista_slider()	, $html);
    $html = str_replace('{constructor}'	, vista_home()		, $html);
    $html = str_replace('{footer}'		, vista_footer()	, $html);
    $html = str_replace('{ShopCart}'	, vista_cart()		, $html);
    
    $html = str_replace('{URLCSS}'		, 'href="'.APP.'/site_media/css/styles.css"'	, $html);
    $html = str_replace('{URLSCRIPT}'	, 'src="'.APP.'/site_media/js/script.js"'		, $html);
    $html = str_replace('{URLJQUERY}'	, 'src="'.APP.'/site_media/js/jquery.js"'		, $html);
    $html = str_replace('{URLLOGO}'		, 'src="'.APP.'/site_media/img/logo.png"'		, $html);
    $html = str_replace('{URLICO1}'		, 'src="'.APP.'/site_media/img/oferta2.png"'	, $html);
	$html = str_replace('{URLICO2}'		, 'src="'.APP.'/site_media/img/avion2.png"'		, $html);
	$html = str_replace('{URLICO3}'		, 'src="'.APP.'/site_media/img/hotel.png"'		, $html);
    

    $html = General::actionViewCart($html);


    $html = str_replace('{formularioTop}'	, General::action_form()	, $html);//en medio
    $html = str_replace('{topNav}'			, General::action_topNav()	, $html);
    $html = str_replace('{formularioTop}'	, General::action_form()	, $html);

    $html = getSecctionHome($html);

    $html = str_replace('{vuelos}'	, General::action_get_product("VOLS")	, $html);
    $html = str_replace('{hoteles}'	, General::action_get_product("HOTELS")	, $html);
    $html = str_replace('{ofertas}'	, General::action_get_product("OFERTES"), $html);


    print $html;

}


function getSecctionHome($html){

    $html = str_replace('{sectionHome}', 'class="secction"', $html);
    $html = str_replace('{sectionVols}', '', $html);
    $html = str_replace('{sectionHotels}', '', $html);
    $html = str_replace('{sectionOfertes}', '', $html);
    $html = str_replace('{sectionCarrito}', '', $html);

    return $html;

}
