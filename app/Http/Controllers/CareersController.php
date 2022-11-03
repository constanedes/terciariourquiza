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

    public function store(Request $request)
    {
        $request->validate([
            'career' => 'required|string',
            'desc' => 'required|string'
        ]);

        DB::transaction(function () use ($request) {
            Career::create([
                'career' => $request['career'],
                'desc' => $request['desc']
            ]);
        });

        return redirect()->route('pages.administracion.carreras.index')->with('success', 'Data saved!');
    }
}
