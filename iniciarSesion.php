<?php
include 'db.php';

mysqli_select_db($conn,'usuario');
$nombreUsuario = $_POST['nombreUsuario'];
$contrasena = $_POST['contrasena'];

$loginQuery = "SELECT * FROM usuario WHERE nombre_usuario = '$nombreUsuario' AND contrasena = md5('$contrasena')";
$resultQuery = mysqli_query($conn,$loginQuery);
$userExist = mysqli_num_rows($resultQuery);

$loginNameQuery = "SELECT * FROM usuario WHERE nombre_usuario = '$nombreUsuario'";
$loginPassQuery = "SELECT * FROM usuario WHERE contrasena = md5('$contrasena')";
$resultName = mysqli_query($conn,$loginNameQuery);
$findName = mysqli_num_rows($resultName);
$resultPass = mysqli_query($conn,$loginPassQuery);
$findPass = mysqli_num_rows($resultPass);

if($userExist == 1){
    $_SESSION['USER_NAME'] = $nombreUsuario;
    echo "Haz ingresado.";
    // $insertQuery = "INSERT INTO logeos(correo) VALUES ('$nombreUsuario')";
    // $resultInsert = mysqli_query($conn,$insertQuery);
    // if(!$resultInsert){
    //     echo "Ha fallado la query";
    // }
    // header('location: index.php');
}else if($findName==0 && $findPass==0){
    $_SESSION['data_incorrect'] = "Datos de usuario incorrecto.";
    header('location: VinicioSesion.php');
}else if($findName==0){
    $_SESSION['user_data_incorrect'] = "Nombre de usuario mal ingresado.";
    header('location: VinicioSesion.php');
}else if($findPass==0){
    $_SESSION['pass_data_incorrect'] = "Contraseña incorrecta.";
    header('location: VinicioSesion.php');
}

// if(isset($_POST['iniciar_sesion'])){
//     $insertQuery = "INSERT INTO logeos(correo) VALUES ('$nombreUsuario')";
//     $resultInsert = mysqli_query($conn,$insertQuery);
    // if(!$resultInsert){
    //     echo "Ha fallado la query";
    // }
//     header('location: index.php');
// }
$_SESSION['error_login'] = "Ha ocurrido un error interno. Verificar Código.";
header('location: VinicioSesion.php');
?>