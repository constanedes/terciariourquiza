<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\DataTables\EntrantsDataTable;
use App\Mail\ConfirmInscription;
use App\Models\Career;
use App\Models\Student;
use App\Models\Turn;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{
    public function index(StudentsDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.estudiantes.index');
    }

    public function ingresantesIndex(EntrantsDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.ingresantes.index');
    }

    public function confirm(Request $request)
    {
        Student::where('id', '=', $request['id'])
            ->update(['completePreinscription' => 1]);
        return $request['id'];
    }

    public function store(Request $request)
    {
        $request->validate([
            'typedoc' => 'required',
            'numdoc' => 'required|numeric',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8|string',
            'nationality' => 'required|string',
            'phone' => 'required',
            'address' => 'required'
        ]);

        //DB::transaction(function () use ($request) {
        DB::beginTransaction();
        try {


            $turn = null;
            $onOld = 0;
            if (Career::select('quota')->where('id', '=', intVal($request->career))->first()->quota == 0) {
                $onOld = 1;
            } else {
                Career::where('id', '=', $request->career)->decrement('quota', 1);
            }
            $user = User::firstOrcreate(
                [
                    'numdoc' => $request['numdoc']
                ],
                [
                    'typedoc' => $request['typedoc'],
                    'name' => $request['name'],
                    'surname' => $request['surname'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'nationality' => $request['nationality'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'postalcode' => $request['postalcode'],
                    'locality' => $request['locality'],
                    'birthday' => $request['birthday'],
                    'title' => $request['title'],
                    'yearofgraduation' => $request['yearofgraduation'],
                    'institution' => $request['institution']
                ]
            );
            $student = Student::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'inscription' => $request->inscription
                ]
            );

            $student->careers()->attach(
                Career::find($request['career']),
                [
                    'year' => Setting::select('obs')->where('name', '=', 'inscripcion')->first()->obs,
                    'onOld' => $onOld
                ]
            );
            if ($onOld == 1) {
                Turn::where('id', '=', $request->time)
                    ->update(['student_id' => $student->id]);
                $turn = Turn::select('date', 'time')->where('id', '=', $request->time)->first();
            }
            DB::commit();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return
                redirect()->route('index')->with(
                    'error',
                    'Usted ya se encuentra preinscripto en este ciclo lectivo a esta carrera!'
                );
        }

        Mail::to($user->email)->send(new ConfirmInscription(
            $user->name,
            $user->surname,
            $user->numdoc,
            Career::select('career')->where('id', '=', $request->career)->first()->career,
            $turn ? $turn->date : null,
            $turn ? $turn->time : null
        ));

        return redirect()->route('index');
    }

    public function getStudentById($id)
    {
        return Student::first()->where('id', '=', $id);
    }
}
