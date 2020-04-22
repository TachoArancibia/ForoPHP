<?php
include 'db.php';

mysqli_select_db($conn,'usuario');
$nombreU = $_POST['nombreUsuario'];
$query = "SELECT * FROM usuario WHERE nombre_usuario = '$nombreU'";
$result = mysqli_query($conn, $query);
$find = mysqli_num_rows($result);
if(!$result){
    echo 'Error query.';
}
if($find == 1){
    $_SESSION['message_user'] = 'Usuario existente. Intente con otro Nombre.';
    header('location: Vregistro.php');
}else if(isset($_POST['agregar_usuario'])){

    $nombreUsuario = $_POST['nombreUsuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena1 = $_POST['contrasena1'];
    $contrasena2 = $_POST['contrasena2'];
    

    $insert = "INSERT INTO usuario (nombre_usuario,nombre,apellido,correo,contrasena,contrasena2) VALUES ('$nombreUsuario', '$nombre', '$apellido', '$correo',md5('$contrasena1'), md5('$contrasena2'))";
    $resultIns = mysqli_query($conn, $insert);
    if(!$resultIns){
        die("Ha fallado la consulta.");
    }

    $_SESSION['message'] = 'Usuario Registrado con éxito.';
    $_SESSION['message_type'] = 'success';
    header('location: Vregistro.php');
    
}



?>