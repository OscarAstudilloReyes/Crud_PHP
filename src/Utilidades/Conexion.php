<?php

namespace Utilidades;
require_once('../Utilidades/Configuracion.php');

class Conexion
{
    private static $instance;
    private $connection;

    private function __construct()
    {
         // Configurar la conexión a la base de datos
        $dsn = 'mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_NAME;
        $this->connection = new \PDO($dsn, DB_USER, DB_PASSWORD);
        
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
