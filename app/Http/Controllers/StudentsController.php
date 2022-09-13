<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\Models\Student;
class StudentsController extends Controller
{
    public function index(StudentsDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.estudiantes.index');
    }

    public function store(Request $request)
    {
        $horariosTurnos = date('H:i:s', mktime(19, 20, 0));
        $arrayHorariosTurnos = [];
        // incrementar $horariosTurnos en 20 minutos hasta llegar a las 23:00:00
        while ($horariosTurnos < '23:00:00') {
            $horariosTurnos = date('H:i:s', strtotime($horariosTurnos) + 20 * 60);
            array_push($arrayHorariosTurnos, $horariosTurnos);
        }
        return $arrayHorariosTurnos;
        \DB::Transaction(function($request){
            Student::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
            ]);
        });
    }
}
