<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DatePeriod;
use App\Models\Turn;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\DataTables\TurnsDataTable;

class TurnsController extends Controller
{
    public function index(TurnsDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.turnos.index');
    }

    public function generateTurns(Request $request)
    {
        $fechaInicio = explode(':', $request['hora_inicio']);
        $begin = date_create($request['fecha_inicio']);
        $end = date_create($request['fecha_fin']);
        $interval = date_interval_create_from_date_string('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $resultado = [];
        $arrayHorariosTurnos = [];
        foreach ($period as $dt) {
            if ($dt->format("N") < 6) {
                array_push($resultado, $dt->format('m-d-Y'));
                $horariosTurnos = date('H:i:s', mktime(intVal($fechaInicio[0]), intVal($fechaInicio[1]), 0));
                // incrementar $horariosTurnos en 20 minutos hasta llegar a las 23:00:00
                while ($horariosTurnos < $request['hora_fin'] . ':00') {
                    array_push($arrayHorariosTurnos, ['date' => $dt->format('Y-m-d'), 'time' => $horariosTurnos]);
                    $horariosTurnos = date('H:i:s', strtotime($horariosTurnos) + $request['duration'] * 60);
                }
            }
        }
        DB::transaction(function () use ($arrayHorariosTurnos) {
            Turn::insert($arrayHorariosTurnos);
        });
        return redirect('administracion/turnos');
    }

    public function getDays(Request $request)
    {
        return Turn::select('date')->where('student_id', '=', null)->groupBy('date')->get();
    }

    public function getHours(Request $request)
    {
        return Turn::select('id', 'time')
            ->where('date', '=', $request->route('date'))
            ->where('student_id', '=', null)
            ->get();
    }
}
