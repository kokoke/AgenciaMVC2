<?php

require_once 'application/controllers/general.php';

class Register {

    public static function set_user($tipo, $data=array()) {
        //pd($data);
        switch ($tipo) {
            case 'simple':
                $datos = DataBase::insertar('

                        INSERT INTO  USUARIS

                            (`id`,`nom`, `cognoms`,`login`,`password`,`is_actiu`,`email`

                        )VALUES (

                            NULL ,  "'.$data["nombre"].'",  "'.$data["apellido"].'",  "",  "",  "1",  "'.$data["email"].'"

                        )

                    ');
            break;
            case 'user':

            break;

        }

        //pd($datos);
        $_SESSION["user_login"] = $data["nombre"];

        return $datos;

    }

}