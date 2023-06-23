<?php
require_once './src/Controlador/LoginControlador.php';
// Obtener los valores del formulario de login
$usuario = $_POST['usuario'] ?? '';
$contrasenia = $_POST['contrasenia'] ?? '';
$loginControlador = new LoginControlador();


$respuesta = $loginControlador->autenticacion($usuario, $contrasenia);

echo json_encode($respuesta);
