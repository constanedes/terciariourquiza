@extends('layouts.main')
@section('content')
<br>
<form class="row g-3 needs-validation" novalidate>

<div class="col-md-10" >
    <h5>Preinscripcion a Desarrollo de Software</h5>
</div>


<div class="col-md-3">
    <label for="validationCustom04" class="form-label">Tipo de documento</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">seleccionar</option>
      <option>DNI</option>
      <option>Pasaporte</option>
      <option>LC</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Documento</label>
    <input type="number" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>

  <div class="col-md-8">
    <label for="validationCustom01" class="form-label">Nombres</label>
    <input type="text" class="form-control" id="validationCustom01" value="Juan" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  
    <label for="validationCustom02" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="validationCustom02" value="Perez" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-8">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Nompre completo
      </div>
    </div>

    <label for="validationCustom03" class="form-label">Tel / Celular</label>
    <input type="number" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>

  

<div class="col-md-6">
	<div class=form-label>
		<label for=”fechaNacimiento” class=”form-label”>Fecha de nacimiento</label>
		<input type="date" name=”fechaNacimiento” class=”form-control” id=”fechaNacimiento” 
        min="1970-01-01" max="2005-12-31"
        placeholder=”dd/mm/aaaa”>
    </div>
</div>

<div>
<div class="col-md-6">
    <label for="validationCustom02" class="form-label">Domicilio</label>
    <input type="text" class="form-control" id="validationCustom02" value="Domicilio" required>
    <div class="valid-feedback">
      Looks good!
    </div>
</div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Ciudad</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
    
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Provincia</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Seleccionar</option>
      <option>...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>

    <label for="validationCustom04" class="form-label">Pais</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Seleccionar</option>
      <option>...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>

</div>


  <div class="col-md-5">
    <label for="validationCustom04" class="form-label">Titulo secundario</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Seleccionar</option>
      <option>...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>

    <label for="validationCustom04" class="form-label">Institucion</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Seleccionar</option>
      <option>...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Año de Egreso</label>
    <input type="number" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
    </div>


<div class="col-md-6">
    <label for="validationCustom04" class="form-label">Curso opcional</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Tecnico Superior</option>
      <option>Desarrollo de Software</option>
      <option>Infraestructura de Tecnologia de la Informacion</option>
      <option>Analista Funcional</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
</div>



<div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
</div>

</form>
@stop