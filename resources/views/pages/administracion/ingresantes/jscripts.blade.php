@section('jscripts')
<script>
    function complete(id, name, surname, numdoc) {
        console.log(id + name + surname + numdoc);
        document.getElementById('mDoc').textContent = numdoc
        document.getElementById('mName').textContent = name
        document.getElementById('mSurname').textContent = surname
        document.getElementById('send').onclick = () => send(id)
        $('#staticBackdrop').modal('toggle');
    }
    function closeModal() {
        $('#staticBackdrop').modal('toggle');
        document.getElementById('mDoc').textContent = ''
        document.getElementById('mName').textContent = ''
        document.getElementById('mSurname').textContent = ''
        document.getElementById('send').removeAttribute('onclick')
    }
    function send(id) {
        (async () => {
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const rawResponse = await fetch('/administracion/ingresantes/confirmar', {
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