<?php

namespace Modelo;
use Utilidades\Conexion;
require_once('../Utilidades/Conexion.php');


class Proceso
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::getInstance()->getConnection();
    }

    public function obtenerProcesos()
    {
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
        $sql = 'SELECT
                        * 
                    FROM 
                        pro_proceso
                ';
                $rw = $this->db->query($sql);
                $retorno['exito'] = 1;
                $retorno['datos'] = $rw->fetchAll();
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }
}
