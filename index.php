<?php 
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-4 my-2">
            <a href="crearPost.php" class="btn btn-outline-danger btn-block"> Crear Post </a>
            <?php if(isset($_SESSION['post_created'])){  ?>
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['post_created'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
        </div>
    </div>
    <!-- MOSTRAR POSTS -->
    <div class="row justify-content-center">
        <?php 
        $queryShowPost = "SELECT * FROM post";
        $posts = mysqli_query($conn,$queryShowPost);
        while($post = mysqli_fetch_array($posts)){ ?>
        <div class="col-md-4">
            <div class="card bg-light mb-3 my-1">
                <div class="card-header"> Autor - Post </div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $post['titulo'];  ?></h5>
                    <p class="card-text"> <?php echo $post['post'] ?> </p>
                </div>
                <div class="card-header"> <?php echo $post['fecha_post']; ?> </div>
            </div>
            <a href="Vcomentarios.php?id=<?php echo $post['id_post'] ?>" class="btn btn-outline-dark btn-block"> Comentar </a>
        </div>
        <?php } ?>
    </div>
</div>












<?php
include 'includes/footer.php';
?>