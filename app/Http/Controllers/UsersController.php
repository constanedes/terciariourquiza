<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.users.index');
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

        DB::transaction(function () use ($request) {
            User::create([
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
            ]);
        });
        return View::make('pages.administracion.users.index')->with('success', 'Data saved!');
    }
}
