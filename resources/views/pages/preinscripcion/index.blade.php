@include('pages.preinscripcion.jscripts')
@extends('layouts.main')
@section('content')
<div class="container">
    <div class="container-fluid mt-5 mb-2 p-5 pt-1 border border-secondary rounded">
        <form class="row g-3 needs-validation m-3 p-5" novalidate method="POST" action="/preinscripcion/enviar">
            @csrf
            @foreach($errors->all() as $error)
            <span class="text-danger">{{$error}}</span>
            @endforeach
            <div class="col-md-12 text-center">
                <h2>Preinscripcion a Desarrollo de Software</h2>
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
                <input type="number" class="form-control" name="numdoc" required />
                <div class="invalid-feedback">Please provide a valid city.</div>
            </div>
            <!-- Nombre -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom01" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="name" required />
                <div class="valid-feedback">Looks good!</div>
            </div>
            <!-- Apellido -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom02" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="surname" required />
                <div class="valid-feedback">Looks good!</div>
            </div>
            <!-- Email -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" name="email" aria-describedby="inputGroupPrepend"
                        required />
                    <div class="invalid-feedback">Nompre completo</div>
                </div>
            </div>
            <!-- Celular -->
            <div class="col-md-6 pl-5 pr-5">
                <label for="validationCustom03" class="form-label">Tel / Celular</label>
                <input type="number" class="form-control" name="phone" required />
                <div class="invalid-feedback">Please provide a valid city.</div>
            </div>
            <!-- Fecha Nac -->
            <div class="col-md-db form-label form-date">
                <label class="form-label form-date__label" for="input-date">Fecha Nacimiento</label>
                <input class="form-control form-date__input" type="date" id="input-date" name="birthday" />
            </div>
            <!-- Domicilio -->

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Domicilio</label>
                <input type="text" class="form-control" id="validationCustom02" value="Domicilio" required />
                <div class="valid-feedback">Looks good!</div>
            </div>

            <!-- Ciudad -->
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Localidad</label>
                <select class="form-select" id="locality" name="locality" required></select>
                <div class="invalid-feedback">Please provide a valid city.</div>
            </div>
            <!-- Provincia -->
            <div class="col-md-6">
                <label for="prov" class="form-label">Provincia</label>
                <select class="form-select" id="prov" name="province" onchange="loadCities(this.value)"
                    required></select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <!-- Pais -->
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Pais</label>
                <select class="form-select" required></select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <!-- Titulo Secundario -->
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Titulo secundario</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Seleccionar</option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <!-- Año egreso -->
            <div class="col-md-6 ">
                <label for="validationCustom03" class="form-label">Año de Egreso</label>
                <input type="number" class="form-control" id="validationCustom03" required />
                <div class="invalid-feedback">Please provide a valid city.</div>
            </div>
            <!-- Institucion -->
            <div class="col-md-6 ">
                <label for="validationCustom04" class="form-label">Institucion</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Seleccionar</option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <!-- Curso opcional -->
            <div class="col-md-6 ">
                <label for="validationCustom04" class="form-label">Curso opcional</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Tecnico Superior</option>
                    <option>Desarrollo de Software</option>
                    <option>
                        Infraestructura de Tecnologia de la Informacion
                    </option>
                    <option>Analista Funcional</option>
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>

            <!-- Fecha turno -->
            <div class="form-date col-md-6">
                <label class="form-date__label" for="input-date">Turno</label>
                <input class="form-date__input" type="date" id="input-date" name="input-date-start" />
            </div>

            <div class="col-md-6 ">
                <label for="validationCustom04" class="form-label">Horarios</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">19:20</option>
                    <option>19:20</option>
                    <option>19:30</option>
                    <option>19:40</option>
                    <option>19:50</option>
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>

            <!-- Enviar -->
            <div class="container text-center">
                <div class="row align-items-end">
                    <div class="col">
                        <button class="btn btn-outline-secondary  btn-lg" type="submit">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@yield('jscripts')