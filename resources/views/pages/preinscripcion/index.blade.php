@include('pages.preinscripcion.jscripts')
@extends('layouts.main')
@section('content')
<div class="container">
    <div class="container-fluid mt-5 mb-2 p-5 pt-1 border border-secondary rounded">
        <form class="row g-3 needs-validation m-3 p-5" id="preinscription-form" method="POST" action="/carreras">
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
            <div class="col-md-12 text-center">
                <h2>
                    Formulario de inscripcion
                </h2>
            </div>

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

            <!-- DNI -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom03" class="form-label">Documento</label>
                <input type="number" class="form-control" name="numdoc" pattern="/^\d{8}" maxlength="9"
                    value="{{old('numdoc')}}" required />
                <div class="invalid-feedback">Please provide a valid city.</div>
            </div>

            <!-- Nombre -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom01" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="name" required pattern="^[a-zA-z ]+$"
                    value="{{old('name')}}" />
                <div class="valid-feedback">Looks good!</div>
            </div>

            <!-- Apellido -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom02" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="surname" value="{{old('surname')}}"
                    pattern="\b[a-zA-Z]+\b" required />
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
                <input id="password" class="form-control" type="password" minlength="8" name="password" id="password"
                    required />
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
                <input type="text" class="form-control" id="validationCustom02" name="address"
                    value="{{old('address')}}" required />
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
                <select class="form-select" id="prov" name="province" onchange="loadCities(this.value)"
                    required></select>
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

            <!-- Titulo Secundario -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom04" class="form-label">Titulo secundario</label>
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

            <!-- Fecha turno -->
            
            <div class="form-date col-md-6 pl-5 pr-5 ">
                <label class="form-label" for="input-date">Turno</label>
                <input class="form-control" id="datepicker" name="turn" onchange="loadHours(this.value)" />
            </div>

            <div class="col-md-6 pl-5 pr-5 pt-3">
                <label for="validationCustom04" class="form-label">Horarios</label>
                <select class="form-select" id="time" name="time" required>
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>

            <!-- Enviar -->
            <div class="container text-center">
                <div class="row align-items-end">
                    <div class="col">
                        <button class="btn btn-outline-warning  btn-lg" type="submit">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@yield('jscripts')