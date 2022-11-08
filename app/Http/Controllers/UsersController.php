<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.users.index');
    }

    public function newUserView(Request $request)
    {
        $roles = $this->getRoles();
        return view('pages.administracion.users.create.create')
            ->with('roles', $roles);
    }

    public function editUserView(Request $request)
    {
        $user = User::select([
            'id',
            'name',
            'surname',
            'email',
            'phone',
            'typedoc',
            'numdoc',
            'password',
            'birthday',
            'address',
            'postalcode',
            'nationality',
            'title',
            'institution',
            'yearofgraduation'
        ])->where('id', '=', $request['id'])->first();
        return view('pages.administracion.users.editar.editar')->with([
            'user' => $user,
            'roles' => $this->getRoles()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_doc' => 'required',
            'num_doc' => 'required|numeric',
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
            ]);
            $user->assignRole($request['rol']);
        });

        return redirect()->route('pages.administracion.users.index')->with('success', 'Data saved!');
    }

    public function getRoles()
    {
        return Role::select('name')->where('name', '<>', 'student')->get();
    }
}
