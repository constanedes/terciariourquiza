@section('confirmModal')
<h1 class="bg-warnig">se ve</h1>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-warning justify-content-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> -->
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Confirmar Ingresante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr class="table-warning">
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>      
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">id number</th>
                    <td>name</td>
                    <td>last_name</td>      
                  </tr>    
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

@endsection