@section('login')
    <div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="index.php" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Recordar mi usuario
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col">
                            <p class="text-left" style="font-size: small;">No tienes una cuenta?
                                <span class="text-primary"><a href="/registro">Registrarse</a></span>
                            </p>
                            <p class="text-left text-primary" style="font-size: small;">Olvidaste tu contraseña?</p>
                        </div>
                        <button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary float-right">Ingresar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop