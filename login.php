<?php include("includes/head.php") ?>
<?php include("includes/nav.php") ?>


<body class="body__login">
    <div class="container-fluid vh-100">
        <div class="">
            <div class="rounded d-flex justify-content-center ">
                <div class="col-md-5  col-sm-12 div__login p-5 bg-light pt-xxl">
                    <div class="text-center">
                        <h3 class="text-primary">Iniciar sesion</h3>
                    </div>
                    <form action="index.php" method="POST">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input id="userLogin" type="text" class="form-control" value="" placeholder="Usuario" required onkeyup="this.value=Numeros(this.value)" >
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input id="passLogin" type="password" class="form-control" placeholder="Contraseña" required >
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Recordar mi usuario
                                </label>
                            </div>
                            <button class="btn btn-primary text-center mt-2" type="submit">
                                Ingresar
                            </button>
                            <p class="text-center mt-5">No tienes una cuenta?
                                <span class="text-primary"><a href="signup.php">Registrarse</a></span>
                            </p>
                            <p class="text-center text-primary">Olvidadaste tu contraseña?</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?> 
</body>
</html>