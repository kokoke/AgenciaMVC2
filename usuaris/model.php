<?php
# Importar modelo de abstracción de base de datos
require_once('../core/DBCon.php');


class Usuari extends DBCon {

    ############################### PROPIEDADES ################################
    public $nom;
    public $cognoms;
    public $login;
    public $email;
    private $passwd;

    ################################# MÉTODOS ##################################
    # Traer datos de un usuario
    public function get($user_email='') {
        if($user_email != '') {
            $this->query = "
                SELECT      nom, cognoms, login ,email, password
                FROM        usuaris
                WHERE       email = '$user_email'
            ";
            $this->get_results_from_query();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->missatge = 'Usuari trobat';
        } else {
            $this->missatge = 'Usuario no trobat';
        }
    }

    # Crear un nuevo usuario
    public function set($user_data=array()) {
        if(array_key_exists('email', $user_data)) {
            $this->get($user_data['email']);
            if($user_data['email'] != $this->email) {
                foreach ($user_data as $campo=>$valor) {
                    $$campo = $valor;
                }
                $this->query = "
                        INSERT INTO     usuaris
                        (nom, cognoms, login, email, password)
                        VALUES
                        ('$nom', '$cognoms','$login', '$email','$passwd')
                ";
                $this->execute_single_query();
                $this->missatge = 'Usuari agregat exitosament';
            } else {
                $this->missatge = "L'usuari ja existeix";
            }
        } else {
            $this->missatge = "No s'ha agregat a l'usuari";
        }
    }

    # Modificar un usuario
    public function edit($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "
                UPDATE      usuaris
                SET         nom='$nom',
                            cognoms='$cognoms',
                            password='$passwd',
                            login='$login',
                WHERE       email = '$email'
        ";
        $this->execute_single_query();
        $this->missatge = 'Usuari modificat';
    }

    # Eliminar un usuario
    public function delete($user_email='') {
        $this->query = "
                DELETE FROM     usuaris
                WHERE           email = '$user_email'
        ";
        $this->execute_single_query();
        $this->missatge = 'Usuari eliminat';
    }

    # Método constructor
    function __construct() {
        $this->db_name = 'agenciaMVC';
    }

    # Método destructor del objeto
    function __destruct() {
        unset($this);
    }
}
?>
