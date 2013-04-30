<?php

class DataBase {

    public function __construct()
    {
        // Configuración de nuestra base de datos
        $config = array(
            'driver'      => 'mysql',
            'host'        => 'db410011760.db.1and1.com',
            'basededades' => 'db410011760',
            'usuari'      => 'dbo410011760',
            'contrasenya' => '08148041',
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
        $conexion = new DataBase();
        // Realizamos la consulta
        return (array) $conexion->db->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertar($consulta)
    {
        $conexion = new DataBase();
        return (array) $conexion->db->query($consulta);
    }
}