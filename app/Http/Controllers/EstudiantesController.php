<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EstudiantesDataTable;

class EstudiantesController extends Controller
{
    public function index(EstudiantesDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.estudiantes.index');
    }
}
