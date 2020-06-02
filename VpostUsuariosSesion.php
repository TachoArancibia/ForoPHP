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
        $queryPosts = "SELECT p.id, p.titulo, p.descripcion, p.fecha ,u.nombre, u.apellido FROM post p, usuarios u, autores a WHERE p.id_autor = a.id AND a.id_usuario = u.id";
        $posts = mysqli_query($conn,$queryPosts);
        while($post = mysqli_fetch_array($posts)){
        ?>
        <div class="col-md-4">
            <div class="card bg-white mb-3 my-1">
                <div class="card-header"> Autor@ - <?php echo $post['nombre']." ".$post['apellido'] ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo']; ?></h5>
                    <p class="card-text"><?php echo $post['descripcion']; ?></p>
                </div>
                <div class="card-header"><?php echo $post['fecha'] ?></div>
            </div>
            <a class="btn btn-outline-danger btn-block" href="VcomentarPost.php?id=<?php echo $post['id'] ?>"> Comentar </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php 
include 'includes/footer.php';
?>