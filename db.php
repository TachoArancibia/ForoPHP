<?php
if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
}
$dbhost = 'forophp.mysql.database.azure.com';
$dbuser = 'admindb@forophp';
$dbpass = '5TKTg3loDFsa';
$dbname = 'foro';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//if($conn){
//     echo "Conexión con base de datos establecida.";
//} else {
//    echo "No se ha podido conectar a la base datos.";
//}

?>
