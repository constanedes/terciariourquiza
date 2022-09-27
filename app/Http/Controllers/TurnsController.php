<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TurnsController extends Controller
{
    public function generateTurns()
    {
        $begin = date_create('2022-09-10');
        $end = date_create('2022-09-20');
        $interval = date_interval_create_from_date_string('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $resultado = [];
        foreach ($period as $dt) {
            array_push($resultado, $dt->format('m-d-Y'));
            $horariosTurnos = date('H:i:s', mktime(19, 20, 0));
            $arrayHorariosTurnos = [];
            // incrementar $horariosTurnos en 20 minutos hasta llegar a las 23:00:00
            while ($horariosTurnos < '23:00:00') {
                $horariosTurnos = date('H:i:s', strtotime($horariosTurnos) + 20 * 60);
                array_push($arrayHorariosTurnos, $horariosTurnos);
            }
        }
        return response()->json($resultado);
    }
}
