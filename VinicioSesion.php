<?php session_start();?>
<?php include '../blogEvaluacion/includes/header.php';?>
<?php include '../blogEvaluacion/includes/navbar.php';?>

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-5 my-2">
            <h3 class="text-center"> Inicio de Sesión </h3>
            <form method="POST" action="iniciarSesion.php" name="iniciarSesion">
                <input class="form-control my-1" type="text" name="nombreUsuario" placeholder="Nombre de Usuario" required>
                <input class="form-control my-1" type="password" name="contrasena" placeholder="Contraseña" required>
                <input class="btn btn-outline-danger btn-block" type="submit" value="Iniciar Sesión" name="iniciar_sesion">
            </form>
            <?php if(isset($_SESSION['user_data_incorrect'])){  ?>
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['user_data_incorrect'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
            <?php if(isset($_SESSION['pass_data_incorrect'])){  ?>
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['pass_data_incorrect'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
            <?php if(isset($_SESSION['data_incorrect'])){  ?>
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['data_incorrect'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
            <?php if(isset($_SESSION['error_login'])){  ?>
                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['error_login'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>
        </div>
    </div>
</div>

<?php include '../blogEvaluacion/includes/footer.php';?>