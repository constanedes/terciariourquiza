<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\DataTables\CareersDataTable;

class CareersController extends Controller
{
    public function index(CareersDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.carreras.index');
    }

    public function careerPage(Request $request)
    {
        $career = Career::select('career', 'desc', 'image')->where('id', '=', $request->route('id'))->first();
        return view('pages.nuestrascarreras.nuestrascarreras')->with('carrera', $career);
    }

    public function careersSelect(Request $request)
    {
        $entrant = [
            'typedoc' => $request->typedoc,
            'numdoc' => $request->numdoc,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
            'province' => $request->province,
            'locality' => $request->locality,
            'nationality' => $request->nationality,
            'title' => $request->title,
            'yearofgraduation' => $request->yearofgraduation,
            'institution' => $request->institution,
            'turn' => $request->turn_submit,
            'time' => $request->time
        ];
        $carreras = Career::all();
        return view('pages.carreras')
            ->with('vars', [
                'carreras' => $carreras,
                'entrant' => $entrant
            ]);
    }

    public function getCareers(Request $request)
    {

        return Career::select('id', 'career')->get();
    }

    public function preinscriptionView(Request $request)
    {
        $carrera = Career::find($request->route('id'));
        return view('pages.preinscripcion.index')->with('carrera', $carrera);
    }

    public function store(Request $request)
    {
        $request->validate([
            'career' => 'required|string',
            'desc' => 'required|string'
        ]);



        DB::transaction(function () use ($request) {
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
            }
            Career::create([
                'career' => $request['career'],
                'desc' => $request['desc'],
                'image' => $filename
            ]);
        });

        return redirect()->route('pages.administracion.carreras.index')->with('success', 'Data saved!');
    }
}
