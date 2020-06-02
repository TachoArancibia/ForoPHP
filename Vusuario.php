<?php 
include 'db.php';
include 'includes/header.php';
session_start();
$userName = $_GET['user'];
$varUsuario = $userName;
if($varUsuario == null || $varUsuario == ''){
    echo "No tienes autorización para esta vista.";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#"> PHP CRUD BLOG</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="VpostUsuariosSesion.php?user=<?php echo $varUsuario?>"> Posts </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="VperfilUsuario.php?user=<?php echo $varUsuario?>"> Perfil </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Vusuario.php?user=<?php echo $varUsuario?>"> Menú </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> Cerrar Sesión </a>
            </li>
        </ul>
    </div>
</nav>
<div class="container my-3">
    <div class="row justify-content-center my-2">
        <div class="col-md-3">
            <button class="btn btn-outline-dark btn-block"> 
               ¡Hola <?php echo $varUsuario; ?> !
            </button>
            <h2 class="text-center">
                <small> ¿Qué desear hacer? </small>
            </h2>
            <?php 
                $query = "SELECT * FROM usuarios WHERE usuario = '$varUsuario'";
                $usuario = mysqli_query($conn,$query);
                while($dato = mysqli_fetch_array($usuario)){

            ?>
            <a class="btn btn-outline-danger btn-block" href="VcrearPost.php?id=<?php echo $dato['id'] ?>"> ¡Crear Post! </a>
                <?php }?>
            <a class="btn btn-outline-danger btn-block" href="VpostsUsuario.php?user=<?php echo $varUsuario ?>"> ¡Ir a tus Posts! </a> 
        </div>
    </div>
</div>


<?php  include 'includes/footer.php';?>