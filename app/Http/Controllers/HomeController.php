<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $careers = Career::select(['id', 'career', 'desc_corta', 'image'])->get();
        return view('index')->with('careers', $careers);
    }
}
