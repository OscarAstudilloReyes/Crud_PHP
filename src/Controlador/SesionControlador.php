<?php
class SesionControlador
{
    public function cierreSession()
    {
        session_start();
        session_destroy();
        return [
            'mensaje' => 'Sessiones cerradas',
            'datos' => [
                'rutaLogin' => '../../index.html'
            ],
            'exito' => 1
        ];
    }
}

$sesionControlador = new SesionControlador();
echo json_encode($sesionControlador->cierreSession());
