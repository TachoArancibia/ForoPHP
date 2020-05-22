<?php
include 'db.php';

$nombreUsuario = $_POST['nombreUsuario'];
$contrasena = $_POST['contrasena'];

$query = "SELECT * FROM usuarios WHERE usuario='$nombreUsuario' AND contraseña=md5('$contrasena')";
$resultado = mysqli_query($conn,$query);
$find = mysqli_num_rows($resultado);
if($find == 1){
    session_start();
    $_SESSION['usuario_enSesion'] = $nombreUsuario;
    header('Location: Vusuario.php');
} else if ($find == 0){
    header('Location: Vusuario.php');
}


// $loginNameQuery = "SELECT * FROM usuarios WHERE nombre = '$nombreUsuario'";
// $loginPassQuery = "SELECT * FROM usuarios WHERE contrasena = md5('$contrasena')";
// $resultName = mysqli_query($conn,$loginNameQuery);
// $findName = mysqli_num_rows($resultName);
// $resultPass = mysqli_query($conn,$loginPassQuery);
// $findPass = mysqli_num_rows($resultPass);

// if($userExist == 1){
//     $_SESSION['USER_NAME'] = $nombreUsuario;
//     header('location: Vusuario.php');

    // $insertQuery = "INSERT INTO logeos(correo) VALUES ('$nombreUsuario')";
    // $resultInsert = mysqli_query($conn,$insertQuery);
    // if(!$resultInsert){
    //     echo "Ha fallado la query";
    // }
    // header('location: index.php');
// }else if($findName==0 && $findPass==0){
//     $_SESSION['data_incorrect'] = "Datos de usuario incorrecto.";
//     header('location: VinicioSesion.php');
// }else if($findName==0){
//     $_SESSION['user_data_incorrect'] = "Nombre de usuario mal ingresado.";
//     header('location: VinicioSesion.php');
// }else if($findPass==0){
//     $_SESSION['pass_data_incorrect'] = "Contraseña incorrecta.";
//     header('location: VinicioSesion.php');
// }

// if(isset($_POST['iniciar_sesion'])){
//     $insertQuery = "INSERT INTO logeos(correo) VALUES ('$nombreUsuario')";
//     $resultInsert = mysqli_query($conn,$insertQuery);
    // if(!$resultInsert){
    //     echo "Ha fallado la query";
    // }
//     header('location: index.php');
// }
$_SESSION['error_login'] = "Ha ocurrido un error interno. Verificar Código.";
?>