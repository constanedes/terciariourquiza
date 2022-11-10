@section('modalCupo')
<div class="modal fade" id="cupoModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="myForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 id="carreraCupo"></h2>
                    <h3>Modificar cupo disponible</h3>
                    <input class="form-control" id="cupo" name="cupo" type="number" min="0" required />
                </div>
                <div class="modal-footer">
                    <button onclick="closeCupoModal()" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <input id="id" type="hidden" name="id" />
                    <input id="sendCupo" type="submit" class="btn btn-warning" value="Enviar" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection