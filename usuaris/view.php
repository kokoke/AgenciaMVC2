<?php
$diccionari = array(
    'subtitol'=>array(VIEW_SET_USER=>'Crear un nou usuari',
                      VIEW_GET_USER=>'Buscar usuari',
                      VIEW_DELETE_USER=>'Eliminar un usuari',
                      VIEW_EDIT_USER=>'Modificar usuari'
                     ),
    'links_menu'=>array(
        'VIEW_SET_USER'=>MODUL.VIEW_SET_USER.'/',
        'VIEW_GET_USER'=>MODUL.VIEW_GET_USER.'/',
        'VIEW_EDIT_USER'=>MODUL.VIEW_EDIT_USER.'/',
        'VIEW_DELETE_USER'=>MODUL.VIEW_DELETE_USER.'/'
    ),
    'form_actions'=>array(
        'SET'=>'/agenciaMVC/'.MODUL.SET_USER.'/',
        'GET'=>'/agenciaMVC/'.MODUL.GET_USER.'/',
        'DELETE'=>'/agenciaMVC/'.MODUL.DELETE_USER.'/',
        'EDIT'=>'/agenciaMVC/'.MODUL.EDIT_USER.'/'
    )
);

function get_template($form='get') {
    $file = '../site_media/html/usuari_'.$form.'.html';
    $template = file_get_contents($file);
    return $template;
}

function render_dinamic_data($html, $data) {
    foreach ($data as $clave=>$valor) {
        $html = str_replace('{'.$clave.'}', $valor, $html);
    }
    return $html;
}

function retornar_vista($vista, $data=array()) {
    global $diccionari;
    $html = get_template('template');
    $html = str_replace('{subtitol}', $diccionari['subtitol'][$vista], $html);
    $html = str_replace('{formulari}', get_template($vista), $html);
    $html = render_dinamic_data($html, $diccionari['form_actions']);
    $html = render_dinamic_data($html, $diccionari['links_menu']);
    $html = render_dinamic_data($html, $data);

    // render {mensaje}
    if(array_key_exists('nom', $data)&&
       array_key_exists('cognoms', $data)&&
       $vista==VIEW_EDIT_USER) {
        $missatge = 'Editar usuari '.$data['nom'].' '.$data['cognoms'];
    } else {
        if(array_key_exists('missatge', $data)) {
            $missatge = $data['missatge'];
        } else {
            $missatge = "Dades de l'usuari:";
        }
    }
    $html = str_replace('{missatge}', $missatge, $html);

    print $html;
}
?>
