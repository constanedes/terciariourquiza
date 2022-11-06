@section('navScript')
<script>
    (function (window, document, undefined) {
        window.addEventListener('DOMContentLoaded', function () {
            console.log('work')
            fetch('/getcarreras', { headers: { 'Content-Type': 'applitacion/json' } })

                .then(res => res.json())
                .then(response => {
                    console.log(response)
                    let ul = document.getElementById('carrerasUl')
                    let carreras = ["ds", "af", "iti"];
                    response.forEach(item => {
                        let li = document.createElement('li');
                        let a = document.createElement('a');
                        a.textContent = item.career;
                        a.className = 'dropdown-item';
                        a.href = '/nuestrascarreras/' + item.id
                            ;
                        /* console.log("llego hasta acá") */
                        ul.appendChild(li.appendChild(a));

                    });
                })
                .catch(err => {
                    console.log('error:', err)
                })
        })
    })(window, document, undefined);
</script>

@endsection