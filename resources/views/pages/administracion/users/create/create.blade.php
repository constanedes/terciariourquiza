@include('pages.administracion.users.create.jscripts')
@extends('pages.administracion.administracion')
@section('page')
<div class="container">
    <form class="row g-3 needs-validation m-3 p-5" method="POST" novalidate action="/administracion/users/nuevo">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Tipo de Doc -->
        <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Tipo de documento</label>
            <select class="form-select" name="typedoc" required>
                <option selected disabled value="">seleccionar</option>
                <option>DNI</option>
                <option>Pasaporte</option>
                <option>LC</option>
            </select>
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>
        <!-- Numero DNI -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom03" class="form-label">Documento</label>
            <input type="number" class="form-control" name="numdoc" value="{{old('numdoc')}}" required />
            <div class="invalid-feedback">Please provide a valid city.</div>
        </div>
        <!-- Nombre -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom01" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="name" required value="{{old('name')}}" />
            <div class="valid-feedback">Looks good!</div>
        </div>
        <!-- Apellido -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom02" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="surname" value="{{old('surname')}}" required />
            <div class="valid-feedback">Looks good!</div>
        </div>
        <!-- Email -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustomUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" name="email" aria-describedby="inputGroupPrepend"
                    value="{{old('email')}}" required />
                <div class="invalid-feedback">Nompre completo</div>
            </div>
        </div>
        <!--Password-->
        <div class="col-md-6 pl-5 pr-5">
            <label class="form-label" for="password">
                Password
            </label>
            <input class="form-control" type="password" name="password" id="password" required />
        </div>
        <!-- Celular -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom03" class="form-label">Tel / Celular</label>
            <input type="number" class="form-control" name="phone" value="{{old('phone')}}" required />
            <div class="invalid-feedback">Please provide a valid city.</div>
        </div>
        <!-- Fecha Nac -->
        <div class="col-md-db form-label form-date">
            <label class="form-label form-date__label" for="input-date">Fecha Nacimiento</label>
            <input class="form-control form-date__input" type="date" id="input-date" name="birthday" required />
        </div>
        <!-- Domicilio -->

        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom02" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="validationCustom02" name="address" value="{{old('address')}}"
                required />
            <div class="valid-feedback">Looks good!</div>
        </div>

        <!-- CP -->

        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom02" class="form-label">Código Postal</label>
            <input type="number" class="form-control" id="validationCustom02" name="postalcode"
                value="{{old('postalcode')}}" required />
            <div class="valid-feedback">Looks good!</div>
        </div>

        <!-- Provincia -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="prov" class="form-label">Provincia</label>
            <select class="form-select" id="prov" name="province" onchange="loadCities(this.value)" required></select>
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>

        <!-- Ciudad -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom03" class="form-label">Localidad</label>
            <select class="form-select" id="locality" name="locality" required></select>
            <div class="invalid-feedback">Please provide a valid city.</div>
        </div>

        <!-- Nacionalidad -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom04" class="form-label">Nacionalidad</label>
            <input class="form-control" name="nationality" value="{{old('nationality')}}" required />
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>

        <!-- Titulo -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom04" class="form-label">Titulo</label>
            <input class="form-select" id="validationCustom04" name="title" value="{{old('title')}}" required />
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>

        <!-- Año egreso -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom03" class="form-label">Año de Egreso</label>
            <input type="number" class="form-control" id="validationCustom03" name="yearofgraduation"
                value="{{old('yearofgraduation')}}" required />
            <div class="invalid-feedback">Please provide a valid city.</div>
        </div>
        <!-- Institucion -->
        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom04" class="form-label">Institucion</label>
            <input class="form-control" type="text" id="institution" name="institution" required />
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>

        <div class="col-md-6 pl-5 pr-5">
            <label for="validationCustom04" class="form-label">Rol</label>
            <select class="form-select" id="institution" name="rol" required>
                @foreach($roles as $rol)
                <option value="{{$rol->name}}">{{$rol->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a valid state.</div>
        </div>

        <!-- Enviar -->
        <div class="container text-center">
            <div class="row align-items-end">
                <div class="col">
                    <button class="btn btn-outline-warning btn-lg" type="submit">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@yield('jscripts')