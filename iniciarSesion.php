<?php
include 'db.php';

$nombreUsuario = $_POST['nombreUsuario'];
$contrasena = $_POST['contrasena'];

$query = "SELECT * FROM usuarios WHERE usuario='$nombreUsuario' AND contraseña=md5('$contrasena')";
$resultado = mysqli_query($conn,$query);
$find = mysqli_num_rows($resultado);
$datos = mysqli_fetch_array($resultado);

if($find == 1){
    session_start();
    $userName = $datos[3];
    $_SESSION['usuario_enSesion'] = $userName;
    
    header('location: Vusuario.php?user='.$userName);
} else if ($find == 0){
    $datosErroneos = "Datos de usuario mal ingresados";
    header('location: VinicioSesion.php');
}
?>