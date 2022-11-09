@section('jscripts')
<script>
    function eliminar(id, carrera) {
        console.log(id + carrera);


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
</script>
@endsection