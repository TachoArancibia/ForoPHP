<?php 
include 'db.php';
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM post WHERE id_post = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $post = mysqli_fetch_array($result);
        $titulo = $post['titulo'];
        $texto = $post['post'];
    }
}
if(isset($_POST['crear_comentario'])){
    $id = $_GET['id'];
    $texto = $_POST['texto'];
    $insert = "INSERT INTO comentarios(texto,id_post) VALUE ('$texto',$id)";
    $result = mysqli_query($conn,$result);

    // if(!$result){
    //     echo "Ha fallado la consulta SQL.";
    // }

    $_SESSION['comment_created'] = "Se ha registrado tu comentario";
    header('location: Vcomentarios.php');
}
?>


<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>



<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-5 my-2">
        <div class="card bg-light mb-3 my-1">
            <div class="card-header"> Autor - Post </div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $titulo;  ?></h5>
                    <p class="card-text"> <?php echo $texto ?> </p>
                </div>
            </div>
        </div>        
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 my-2">
            <h3> Comentarios </h3>
            <form action="Vcomentarios.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <textarea class="form-control my-1" name="comentario" rows="2" ></textarea>
                <button class="btn btn-outline-success" name="crear_comentario"> Comentar</button>
            </form>
            <?php if(isset($_SESSION['comment_created'])){  ?>
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['comment_created'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
        </div>
    </div>
</div>


<?php 
include 'includes/footer.php';
?>