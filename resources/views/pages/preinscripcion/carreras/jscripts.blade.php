@section('jscripts')
<script>
    (function (window, document, undefined) {
        window.addEventListener('DOMContentLoaded', () => {
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
        })

    })(window, document, undefined);

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
    function showTurns(cupo) {
        if (cupo < 1) {
            document.getElementById('turns').style.visibility = 'hidden'
            document.getElementById('datepicker').required = false
            document.getElementById('time').required = false
        }
        else {
            document.getElementById('turns').style.visibility = 'visible'
            document.getElementById('datepicker').required = true
            document.getElementById('time').required = true
        }
    }
</script>
@endsection
@yield('jscripts')