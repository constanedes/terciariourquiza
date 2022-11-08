@section('modalDelete')
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 id="carrera"></h2>
                <h3>¿Seguro que desea eliminar?</h3>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal()" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cerrar</button>
                <button id="send" type="button" class="btn btn-warning">Confirmar</button>
            </div>
        </div>
    </div>
</div>
@endsection