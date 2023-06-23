<?php

namespace Controlador;
use Modelo\Proceso;
use Utilidades\Conexion;

require_once('../Utilidades/Conexion.php');
require_once('../Modelo/Proceso.php');

class ProcesoControlador
{
    private $procesoModelo;

    public function __construct(Proceso $procesoModelo)
    {
        $this->procesoModelo = $procesoModelo;
    }

    public function procesarAccion($datos)
    {
        switch ($datos['accion']) {
            case 'mostrar':
                return $this->mostrar();
                break;
            default:
                break;
        }
    }
    public function mostrar()
    {
        $procesoModelo = $this->procesoModelo->obtenerProcesos();
        return $procesoModelo;
    }



}

$procesoControlador = new \Controlador\ProcesoControlador(new \Modelo\Proceso());
$json = $procesoControlador->procesarAccion($_POST);
echo json_encode($json); 