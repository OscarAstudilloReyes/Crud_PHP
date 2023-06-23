<?php

namespace Controlador;
use Modelo\TipoDocumento;
use Utilidades\Conexion;

require_once('../Utilidades/Conexion.php');
require_once('../Modelo/TipoDocumento.php');

class TipoDocumentoControlador
{
    private $tipoDocumento;

    public function __construct(TipoDocumento $tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
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
        $tipoDocumento = $this->tipoDocumento->obtenerTipoDocumento();
        return $tipoDocumento;
    }



}

$TipoDocumentoControlador = new \Controlador\TipoDocumentoControlador(new \Modelo\TipoDocumento());
$json = $TipoDocumentoControlador->procesarAccion($_POST);
echo json_encode($json); 