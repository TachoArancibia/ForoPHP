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
        <?php 
        $queryPost = "SELECT p.id, p.titulo, p.descripcion FROM post p, usuarios u, autores a WHERE p.id_autor = a.id AND a.id_usuario = u.id AND u.usuario = '$varUsuario'";
        $posts = mysqli_query($conn, $queryPost);
        while($post = mysqli_fetch_array($posts)){
        ?>
        <div class="col-md-4">
            <div class="card bg-light mb-3 my-1">
                <div class="card-header"> </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo']; ?></h5>
                    <p class="card-text"><?php echo $post['descripcion']; ?></p>
                </div>
                <div class="card-header"> </div>
            </div>
            <a class="btn btn-outline-danger btn-block" href="VeditarPost.php?id=<?php echo $post['id'] ?>"> Editar </a>
        </div>
        <?php }?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>