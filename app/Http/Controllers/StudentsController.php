<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\DataTables\EntrantsDataTable;
use App\Models\Student;
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

    public function store(Request $request)
    {
        //return $request;
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

        DB::transaction(function () use ($request) {
            $id = User::create([
                'typedoc' => $request['typedoc'],
                'numdoc' => $request['numdoc'],
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
            ])->id;
            $studentId = Student::create([
                'user_id' => $id,
                'inscription' => $request->inscription
            ])->id;
        });

        return View::make('pages.preinscripcion.index')->with('success', 'Data saved!');
    }

    public function getStudentById($id)
    {
        return Student::first()->where('id', '=', $id);
    }
}
