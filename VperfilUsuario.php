<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'blogevaluacion';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
include 'includes/header.php';
include 'includes/navBarUsuario.php';
?>
<?php 
session_start();
$varUsuario = $_SESSION['usuario_enSesion'];
if($varUsuario == null || $varUsuario == ''){
    echo "No tienes autorización para esta vista.";
}
?>

<div class="container my-3">
    <div class="row justify-content-center my-2">
        <?php 
        $queryUsuario = "SELECT * FROM usuarios WHERE usuario = '$varUsuario'";
        $usuario = mysqli_query($conn, $queryUsuario);
        while($datos = mysqli_fetch_array($usuario)){
        ?>
        <div class="col-md-4">
            <h2 class="text-center"> <small>  Datos Personales </small></h3>
            <label> Nombre </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['nombre']; ?>" readonly>
            <label> Apellido </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['apellido']; ?>" readonly>
            <label> Nombre de Usuario </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['usuario']; ?>" readonly>
            <label> Correo </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['correo']; ?>" readonly>
            <h2 class="text-center"> <small> Información Posts </small></h2>
        <?php }?>
        <?php     
        $ownPosts = "SELECT COUNT(*) total FROM usuarios u, post p, autores a WHERE a.id_usuario = u.id AND p.id_autor = a.id AND u.usuario = '$varUsuario'";
        $posts = mysqli_query($conn, $ownPosts);
        while ($query = mysqli_fetch_array($posts)){
        ?>
            <label> Post creados </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $query['total']; ?>" readonly>   
        <?php } ?>
        </div>  
    </div>
</div>



<?php include 'includes/footer.php'; ?>