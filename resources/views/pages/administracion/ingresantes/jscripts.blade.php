@section('jscripts')
<script>
    function complete(id, name, surname, numdoc) {
        console.log(id + name + surname + numdoc);
        $('#staticBackdrop').modal('toggle');
    }
</script>
@endsection