@section('jscripts')
<script>
    (function (window, document, undefined) {
        window.onload = init;

        function init() {
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
            fetch('/turnos/getdays', { headers: { 'Content-Type': 'applitacion/json' } })
                .then(res => res.json())
                .then(response => {
                    const res = []
                    response.forEach(el => {
                        date = new Date(el.date + ' EDT')
                        res.push(date)
                    })
                    $('#datepicker').pickadate({
                        editable: false,
                        disable: [
                            true,
                            ...res
                        ],
                        formatSubmit: 'yyyy-mm-dd'
                    });
                })
                .catch(err => {
                    console.log('error:', err)
                })

        }

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

    function loadHours(el) {
        let date = new Date(el)
        date = date.toISOString().split('T')[0]
        fetch('/turnos/gethours/' + date)
            .then(res => res.json())
            .then(response => {
                let select = document.getElementById('time')
                select.innerHTML = ''
                response.forEach(el => {
                    let op = document.createElement('OPTION');
                    op.innerHTML = el.time;
                    op.value = el.id;
                    select.options.add(op)
                });
            })
    }

    function validateInputs() {
        window.addEventListener('load', () => {
            const dni = document.getElementById('dni');
            const nombre = document.getElementById('nombre');
            const password = document.getElementById('password')
            nombre.setAttribute("pattern", "^[a-zA-z ,.'-]+$");
            dni.setAttribute("pattern", "/^\d{8}");
            password.minLength = 8;
            password.required = "true";
            nombre.required = "true";
            dni.required = "true";
            dni.maxLenght = 9;
        });
    }

    function handleFormSubmit() {
        const form = document.getElementById('preinscription-form');
    }

    validateInputs();

</script>
@endsection