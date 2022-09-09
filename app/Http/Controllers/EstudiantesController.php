<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\DataTables\EstudiantesDataTable;
use App\Models\Estudiante;
class EstudiantesController extends Controller
{
    public function index(EstudiantesDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.estudiantes.index');
    }

    public function guardar(Request $request)
    {
        \DB::Transaction(function($request){
            Estudiante::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
            ]);
        });

    }

}
