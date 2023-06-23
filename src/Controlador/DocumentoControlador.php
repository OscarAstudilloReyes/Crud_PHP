<?php

namespace Controlador;
use Modelo\Documento;
use Utilidades\Conexion;

require_once('../Utilidades/Conexion.php');
require_once('../Modelo/Documento.php');

class DocumentoControlador
{
    private $documentoModelo;

    public function __construct(Documento $documentoModelo)
    {
        $this->documentoModelo = $documentoModelo;
    }

    public function procesarAccion($datos)
    {
        switch ($datos['accion']) {
            case 'mostrar':
                return $this->mostrar();
                break;
            case 'guardar':
                $datos['codigo'] = $this->obtenerCodigoConsecutivo($datos)['datos']['codigo'];

                if(isset($datos['idDocumento']) && $datos['idDocumento'] != ''){
                    return $this->editar($datos);
                }else{
                    return $this->adicionar($datos);
                }
                break;
                case 'eliminar':
                    return $this->eliminar($datos);
                    break;

                case 'mostrarPorId':
                    return $this->mostrarPorId($datos);
                    break;

                case 'buscarPorCodigo':
                    return $this->mostrarPorCodigo($datos);
                    break;
            default:
                // Acción no válida
                break;
        }
    }
    public function mostrar()
    {
        $resDocumentos = $this->documentoModelo->obtenerDocumentos();
        return $resDocumentos;
    }

    public function mostrarPorId($datos)
    {
        $resDocumentos = $this->documentoModelo->obtenerDocumentosPorId($datos['idDocumento']);
        return $resDocumentos;
    }
    public function adicionar($datos)
    {
        $resDocumentos = $this->documentoModelo->adicionar($datos);
        return $resDocumentos;
    }

    public function editar($datos)
    {
        $resDocumentos = $this->documentoModelo->editar($datos);
        return $resDocumentos;
    }

    public function obtenerCodigoConsecutivo($datos) {
        $resDocumentos = $this->documentoModelo->generarCodigoDocumento($datos);
        return $resDocumentos;
    }

    public function eliminar($datos)
    {
        $resDocumentos = $this->documentoModelo->eliminar($datos['idDocumento']);
        return $resDocumentos;
    }
    public function mostrarPorCodigo($datos)
    {
        if($datos['codigo'] == ''){
            $resDocumentos = $this->documentoModelo->obtenerDocumentos();
        }else{
            $resDocumentos = $this->documentoModelo->obtenerDocumentosPorCodigo($datos['codigo']);
        }
        return $resDocumentos;
    }

}


$documentoControlador = new \Controlador\DocumentoControlador(new \Modelo\Documento());
$json = $documentoControlador->procesarAccion($_POST);
echo json_encode($json); 