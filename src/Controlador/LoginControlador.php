<?php
class LoginControlador
{
    public function autenticacion($usuario, $contrasenia)
    {
        try {
            $retorno = ['exito' => 1, 'mensaje' => 'Autenticado correctamente'];
            if ($usuario != 'admin' && $contrasenia !== '123') {
                $retorno['mensaje'] = 'Fallo';
            }else{
               
            }
        } catch (\Exception $ex) {
            $retorno['exito'] = 0;
            $retorno['mensaje'] = $ex->mensage;
        }
        return $retorno;
    }
}

