@section('jscripts')
<script>
    function eliminar(id, carrera) {
        document.getElementById('carrera').textContent = carrera
        document.getElementById('send').onclick = () => send(id)
        $('#staticBackdrop').modal('toggle');
    }
    function closeModal() {
        $('#staticBackdrop').modal('toggle');
        document.getElementById('carrera').textContent = ''
        document.getElementById('send').removeAttribute('onclick')
    }
    function send(id) {
        (async () => {
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const rawResponse = await fetch('/administracion/carreras/eliminar', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({ id: id })
            });
            const content = await rawResponse.json();

            document.querySelector('[title="Reload"]').click()
            $('#staticBackdrop').modal('toggle');
        })();
    }
    function openCupoModal(id, carrera, cupo) {
        $('#cupoModal').modal('toggle');
        document.getElementById('carreraCupo').textContent = carrera
        document.getElementById('cupo').value = cupo
        document.getElementById('id').value = id
        //document.getElementById('sendCupo').onclick = () => sendCupo(id, cupo)
    }
    function closeCupoModal() {
        $('#cupoModal').modal('toggle');
        document.getElementById('carreraCupo').textContent = ''
        document.getElementById('sendCupo').removeAttribute('onclick')
    }

    function sendCupo() {
        (async () => {
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const rawResponse = await fetch('/administracion/carreras/cupo', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({
                    id: document.getElementById('id').value,
                    cupo: document.getElementById('cupo').value
                })
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Fallo al realizar la carga", {
                            cause: response
                        });
                    } else {
                        response.json()
                    }
                })
                .then((data) => {
                    toastr.success('Carga exitosa!', null, {
                        positionClass: 'toast-bottom-right'
                    })
                }).catch((error) => {
                    toastr.error(error, null, {
                        positionClass: 'toast-bottom-right'
                    })
                })
            const content = await rawResponse;

            document.querySelector('[title="Reload"]').click()
            $('#cupoModal').modal('toggle');
        })();
    }


    (function (window, document, undefined) {
        window.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('myForm')
            form.addEventListener('submit', (event) => {
                event.preventDefault()
                sendCupo()
            })

        })
    })(window, document, undefined);
</script>
@endsection