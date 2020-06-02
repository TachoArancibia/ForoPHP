<?php
include 'db.php';
include 'includes/header.php';
session_start();
$varUsuario = $_SESSION['usuario_enSesion'];
if($varUsuario == null || $varUsuario == ''){
    header('Location: VinicioSesion.php');
}
$idUsuario = $_GET['id'];
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
<?php
if(isset($_POST['crear_post'])){
    $titulo = $_POST['titulo'];
    $post = $_POST['post'];
    
    $queryAutor = "SELECT * FROM autores WHERE id_usuario = $idUsuario";
    $autor = mysqli_query($conn, $queryAutor);
    if(!$autor){
        echo "Ha fallado la consulta autor";
    }
    while($datos = mysqli_fetch_array($autor)){
        $idAutor = $datos['id'];
        $insert = "INSERT INTO post(id_autor,titulo,descripcion) VALUES ($idAutor,'$titulo','$post')";
        $result = mysqli_query($conn, $insert);
        if(!$result){
            echo "Ha fallado la consulta.";
        }
    header('Location: Vusuario.php?user='.$varUsuario);
    }
}

?>


<div class="container my-3">
    <div class="row justify-content-center my-2">
        <div class="col-md-5 my-2">
            <h2 class="text-center"><small> Crea un nuevo Post </small></h2>
                <form method="POST">
                    <input class="form-control my-1" type="text" name="titulo" placeholder="Titulo" required>
                    <textarea class="form-control my-1" name="post" rows="5" placeholder="Escriba su post..." required ></textarea>
                    <input class="btn btn-outline-dark btn-block" type="submit" value="¡Crear!" name="crear_post">
                </form>
        </div>

    </div>
</div>
<?php include 'includes/footer.php'; ?>