@section('jscripts')
<script>
    (function (window, document, undefined) {
        window.addEventListener('DOMContentLoaded', () => {
            fetch('https://apis.datos.gob.ar/georef/api/provincias?', { headers: { 'Content-Type': 'applitacion/json' } })
                .then(res => res.json())
                .then(response => {
                    let select = document.getElementById('prov')
                    let provs = response.provincias.sort((a, b) => a.nombre.localeCompare(b.nombre))
                    provs.forEach(el => {
                        let op = document.createElement('OPTION');
                        op.innerHTML = el.nombre;
                        op.value = el.nombre;
                        select.options.add(op)
                    });
                })
                .catch(err => {
                    console.log('error:', err)
                })
        })
    })(window, document, undefined);

    function loadCities(el) {
        fetch(`https://apis.datos.gob.ar/georef/api/localidades?provincia=${el}&max=500`)
            .then(res => res.json())
            .then(response => {
                let select = document.getElementById('locality')
                select.innerHTML = ''
                let localidades = response.localidades.sort((a, b) => a.nombre.localeCompare(b.nombre))
                localidades.forEach(el => {
                    let op = document.createElement('OPTION');
                    op.innerHTML = el.nombre;
                    op.value = el.nombre;
                    select.options.add(op)
                });
            })
    }
</script>
@endsection