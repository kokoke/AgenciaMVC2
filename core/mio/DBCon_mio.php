<?php

class DataBase {

    public function __construct()
    {
        // Configuración de nuestra base de datos
        $config = array(
            'driver'      => 'mysql',
            'host'        => 'localhost',
            'basededades' => 'agenciaMVC',
            'usuari'      => 'root',
            'contrasenya' => '',
            'charset'     => 'utf8',
        );

        $this->db = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['basededades']};charset={$config['charset']}", $config['usuari'], $config['contrasenya']);

    }

    /**
     * Método que realiza una consulat sql a la base de datos
     * @param  SQL $consulta La consulta a realizar
     * @return array         Los datos
     */
    public static function consulta($consulta)
    {
        $conexion = new static();

        // Realizamos la consulta
        return (array) $conexion->db->query($consulta)->fetchAll(PDO::FETCH_ASSOC);

        //$resEmp = mysql_query($consulta, $conexion) or die(mysql_error());

    }
}
