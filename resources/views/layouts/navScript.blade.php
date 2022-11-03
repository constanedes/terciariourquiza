@section('navScript')
<script>

(function (window, document, undefined) {
        window.onload = init;
        function init() {
            fetch('getcarreras', { headers: { 'Content-Type': 'applitacion/json' } })
            
                .then(res => res.json())
                .then(response => {
                    let ul = document.getElementById('carreras')
                    let carreras = ["ds","af","iti"];
                    carreras.forEach(item => {
                        let li = document.createElement('li');
                        console.log("llego hasta acá")
                        li.textContent = item;
                        ul.appendChild(li);
                        
                    });
                })
                .catch(err => {
                    console.log('error:', err)
                })
        }

    })(window, document, undefined);
    
    
</script>

@endsection