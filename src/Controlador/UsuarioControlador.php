<?php
class UsuarioControlador
{
    public function autenticacion($usuario, $contrasenia)
    {
        try {
            $retorno = ['exito' => 1, 'mensaje' => 'Autenticado correctamente'];
            if ($usuario !== 'admin' || $contrasenia !== '123') {
                $retorno['exito'] = 0;
                $retorno['mensaje'] = 'Credenciales invalidas';
            }
        } catch (\Exception $ex) {
            $retorno['exito'] = 0;
            $retorno['mensaje'] = $ex->mensage;
        }
        return $retorno;
    }
}

