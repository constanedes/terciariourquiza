<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::select(['id','nombres','email','created_at','updated_at']);

        return Datatables::of($users)->make();
    }
}
