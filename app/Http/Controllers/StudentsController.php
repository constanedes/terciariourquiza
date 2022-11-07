<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\DataTables\EntrantsDataTable;
use App\Models\Career;
use App\Models\Student;
use App\Models\Turn;
use App\Models\User;
use Illuminate\Support\Facades\View;

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
            ->update(['preinscription_completed' => 1]);
        return $request['id'];
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'typedoc' => 'required',
                'numdoc' => 'required|numeric',
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|min:8|string',
                'nationality' => 'required|string',
                'phone' => 'required',
                'address' => 'required'
            ]
        );

        DB::transaction(
            function () use ($request) {
                $onOld = 0;
                if (Career::select('quota')->where('id', '=', intVal($request->career))->first()->quota == 0) {
                    $onOld = 1;
                } else {
                    Career::where('id', '=', $request->career)->decrement('quota', 1);
                }

                $user = User::create(
                    [
                        'type_doc' => $request['typedoc'],
                        'num_doc' => $request['numdoc'],
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
                        'year_of_graduation' => $request['yearofgraduation'],
                        'institution' => $request['institution']
                    ]
                );
                $student = Student::create(
                    [
                        'user_id' => $user->id,
                        'inscription' => $request->inscription
                    ]
                );

                $student->careers()->attach(
                    Career::find($request['career']),
                    [
                        'year' => date("Y"),
                        'onOld' => $onOld
                    ]
                );
                Turn::where('id', '=', $request->time)
                ->update(['student_id' => $student->id]);
            }
        );
        return View::make('index')->with('success', 'Data saved!');
    }

    public function getStudentById($id)
    {
        return Student::first()->where('id', '=', $id);
    }
}
