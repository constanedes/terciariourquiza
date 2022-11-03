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

    public function careersSelect(Request $request)
    {
        $carreras = Career::all();
        return view('pages.carreras')->with('carreras', $carreras);
    }

    public function getCareers(Request $request)
    {
        $carreras = Career::select('id','career') -> get()  ;
        return $carreras;
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
