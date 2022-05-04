@extends('layouts.main')
@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Localidad</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <script>
        $(document).ready( function () {
            $('#users-table').DataTable({
                "ajax": "/datatables/users",
                "columns": [
                    {"data":"id"},
                    {"data":"user.nombres"},
                    {"data":"user.apellidos"},
                    {"data":"user.email"},
                    {"data":"user.localidad.localidad", "defaultContent":""}    
                ]
            });
        } );
    </script>
@stop