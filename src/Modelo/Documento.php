<?php

namespace Modelo;
use Utilidades\Conexion;
require_once('../Utilidades/Conexion.php');


class Documento
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::getInstance()->getConnection();
    }

    public function adicionar($datos)
    {  $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
            $sql = "INSERT INTO doc_documento (DOC_NOMBRE,DOC_CODIGO,DOC_CONTENIDO,DOC_ID_TIPO,DOC_ID_PROCESO)
                VALUES ('{$datos['nombre']}', '{$datos['codigo']}','{$datos['contenido']}','{$datos['idTipoDocumento']}','{$datos['idProceso']}')";
            $rw = $this->db->query($sql);

            if ($rw == true) {
                $retorno['mensaje']  = "Agregado correctamente";
                $retorno['exito'] = 0;
            } else {
                $retorno['mensaje'] = "Fallo al agregar ";
                $retorno['exito'] = 0;
            }
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

    public function editar($datos)
    {  $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
            $sql = "UPDATE doc_documento
                    SET DOC_NOMBRE = '{$datos['nombre']}',
                    DOC_CODIGO  = '{$datos['codigo']}',
                    DOC_CONTENIDO = '{$datos['contenido']}',
                    DOC_ID_TIPO = '{$datos['idTipoDocumento']}',
                    DOC_ID_PROCESO = '{$datos['idProceso']}'
                    WHERE DOC_ID = {$datos['idDocumento']}";
            $rw = $this->db->query($sql);

            if ($rw == true) {
                $retorno['mensaje']  = "Modificado correctamente";
                $retorno['exito'] = 0;
            } else {
                $retorno['mensaje'] = "Fallo al Modificar ";
                $retorno['exito'] = 0;
            }
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

    public function obtenerDocumentos()
    {
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
        $sql = 'SELECT
                        * 
                    FROM 
                        doc_documento AS dd
                    INNER JOIN pro_proceso AS pp on pp.PRO_ID = dd.DOC_ID_PROCESO
                    INNER JOIN tip_tipo_doc AS ttd on ttd.TIP_ID = dd.DOC_ID_TIPO ';
                $rw = $this->db->query($sql);
                $retorno['exito'] = 1;
                $retorno['datos'] = $rw->fetchAll();
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

    public function obtenerDocumentosPorId($idDocumento)
    {
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
        $sql = "SELECT
                        * 
                    FROM 
                        doc_documento
                    WHERE DOC_ID = $idDocumento ";
                $rw = $this->db->query($sql);
                $retorno['exito'] = 1;
                $retorno['datos'] = $rw->fetchAll();
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

    public function obtenerDocumentosPorCodigo($codigo)
    {
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
        $sql = "SELECT
                        * 
                    FROM 
                        doc_documento
                    WHERE DOC_CODIGO = '$codigo' ";
                $rw = $this->db->query($sql);
                $retorno['exito'] = 1;
                $retorno['datos'] = $rw->fetchAll();
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

    public function generarCodigoDocumento($datos) {
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        $res = $this->obtenerUltimoConsecutivo($datos['idTipoDocumento'], $datos['idProceso']);
        $consecutivo = 0;
        if($res['datos'] !== null && $res['datos'] !== false) {
            $consecutivo = explode('-',$res['datos']['DOC_CODIGO'])[2];
        }
        
        $nuevoConsecutivo =  $consecutivo   + 1;
        $codigo = $datos['tipoDocumentoPrefijo'] . '-' . $datos['procesoPrefijo'] . '-' . $nuevoConsecutivo;
        $retorno['exito'] = 1;
        $retorno['datos'] = ['codigo' => $codigo];
        return $retorno;
    }

    public function obtenerUltimoConsecutivo($idTipoDocumento, $idProceso)
    {
    
    $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
    try {
    $sql = "SELECT MAX(DOC_ID) AS maximo, DOC_CODIGO FROM doc_documento WHERE DOC_ID_TIPO = {$idTipoDocumento} AND DOC_ID_PROCESO = {$idProceso} GROUP BY DOC_ID, DOC_CODIGO order by DOC_ID desc limit 1";
            $rw = $this->db->query($sql);
            $retorno['exito'] = 1;
            $retorno['datos'] = $rw->fetch();
    } catch (Exception $ex) {
        $retorno['mensaje'] = $ex->getMessage();
        $retorno['exito'] = 0;
    }
    return $retorno;
    }

    public function eliminar($idDocumento)
    {  
        $retorno = ['exito' => 1, 'datos' => [], 'mensaje' => ''];
        try {
            $sql = "DELETE from  doc_documento  WHERE DOC_ID = {$idDocumento}";
            $rw = $this->db->query($sql);
            if ($rw == true) {
                $retorno['mensaje']  = "Eliminado correctamente";
                $retorno['exito'] = 0;
            } else {
                $retorno['mensaje'] = "Fallo al Eliminar ";
                $retorno['exito'] = 0;
            }
        } catch (Exception $ex) {
            $retorno['mensaje'] = $ex->getMessage();
            $retorno['exito'] = 0;
        }
        return $retorno;
    }

      
}
