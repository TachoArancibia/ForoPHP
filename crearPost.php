<?php
include 'db.php';

if(isset($_POST['crear_post'])){
    $titulo = $_POST['titulo'];
    $post = $_POST['post'];

    $insert = "INSERT INTO post(titulo,post) VALUES ('$titulo','$post')";
    $result = mysqli_query($conn, $insert);

    if(!$result){
        echo "Ha fallado la consulta.";
    }

    $_SESSION['post_created'] = "Se ha creado un nuevo Post.";
    header('Location: index.php');
}
?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class=container>
    <div class="row justify-content-center my-3">
        <div class="col-md-5 my-2">
            <h3 class="text-center"> ¡Crea un nuevo Post! </h3>
            <form action="crearPost.php" method="POST">
                <input type="text" name="titulo" class="form-control my-1" required placeholder="Ingrese título." required>
                <textarea name="post" class="form-control mt-2" rows="5"></textarea>
                <input type="submit" value="Crear Post" class="btn btn-outline-danger btn-block my-1" name="crear_post" required>
            </form>
        </div>
</div>


<?php
include 'includes/footer.php';
?>