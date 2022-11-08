<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\DataTables\SettingsDataTable;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index(SettingsDataTable $dataTable)
    {
        return $dataTable->render('pages.administracion.configuraciones.configuraciones');
    }

    public function editView(Request $request)
    {
        $setting = Setting::select('id', 'name', 'value', 'obs')->where('id', '=', $request['id'])->first();
        return view('pages.administracion.configuraciones.editar.editar')->with('setting', $setting);
    }

    public function edit(Request $request)
    {
        DB::transaction(function () use ($request) {
            Setting::where('id', '=', $request->id)->update([
                'name' => $request->name,
                'obs' => $request->obs,
                'value' => $request->value == 'on' ? 1 : 0
            ]);
        });
        return redirect()->route('administracion.configuraciones');
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            Setting::create([
                'name' => $request->name,
                'value' => $request->value == 'on' ? 1 : 0
            ]);
        });
    }
    public function getSettingValueByName(Request $request)
    {
        return Setting::select('value')->where('name', '=', $request['name'])->first();
    }
}
