<?php
require_once './src/Controlador/UsuarioControlador.php';
// Obtener los valores del formulario de login
$usuario = $_POST['usuario'] ?? '';
$contrasenia = $_POST['contrasenia'] ?? '';
$usuarioControlador = new UsuarioControlador();


$respuesta = $usuarioControlador->autenticacion($usuario, $contrasenia);


if($respuesta['exito'] == 0){
    echo '<script>alert("Credenciales incorrectas");</script>';
    echo '<script>window.location.href = "/prueba-tecnica/";</script>';
}else{
    header("Location: /prueba-tecnica/src/Vista/principal.html");
}
exit();