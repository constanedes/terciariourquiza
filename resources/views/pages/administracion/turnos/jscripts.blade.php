@section('jscripts')
<script>
    function eliminar(id, date, time) {
        document.getElementById('turno').textContent = "Turno " + date + " " + time
        document.getElementById('send').onclick = () => send(id)
        $('#staticBackdrop').modal('toggle');
    }
    function closeModal() {
        $('#staticBackdrop').modal('toggle');
        document.getElementById('turno').textContent = ''
        document.getElementById('send').removeAttribute('onclick')
    }
    function send(id) {
        (async () => {
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const rawResponse = await fetch('/administracion/turnos/eliminar', {
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