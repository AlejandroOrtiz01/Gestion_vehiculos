<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Marca;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        
        return view('vehiculos.index', [
            'vehiculos' => $vehiculos
        ]);
    }

    public function create()
    {
        $marcas = Marca::all();

        return view('vehiculos.create', [
            'marcas' => $marcas
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'placa_vehiculo' => 'required|unique:vehiculos,placa_vehiculo',
                'marca_id' => 'required',
                'modelo_vehiculo' => 'required',
                'color_vehiculo' => 'required',
                'propietario_vehiculo' => 'required',
            ]);

            Vehiculo::create([
                'placa_vehiculo' => $request->placa_vehiculo,
                'marca_id' => $request->marca_id,
                'modelo_vehiculo' => $request->modelo_vehiculo,
                'color_vehiculo' => $request->color_vehiculo,
                'propietario_vehiculo' => $request->propietario_vehiculo,
            ]);

            session()->flash('success', 'Vehiculo creada correctamente');

            DB::commit();

            return to_route('vehiculos.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo crear el vehiculo: ' . $th->getMessage());
        }
    }

    public function edit(Vehiculo $vehiculo)
    {
        $marcas = Marca::all();
        
        return view('vehiculos.edit', [
            'vehiculo' => $vehiculo,
            'marcas' => $marcas
        ]);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
         DB::beginTransaction();

        try {
            $this->validate($request, [
                'placa_vehiculo' => 'required|unique:vehiculos,placa_vehiculo,' . $vehiculo->id,
                'marca_id' => 'required',
                'modelo_vehiculo' => 'required',
                'color_vehiculo' => 'required',
                'propietario_vehiculo' => 'required',
                'estado_vehiculo' => 'required'
            ]);

            $vehiculo->update([
                'placa_vehiculo' => $request->placa_vehiculo,
                'marca_id' => $request->marca_id,
                'modelo_vehiculo' => $request->modelo_vehiculo,
                'color_vehiculo' => $request->color_vehiculo,
                'propietario_vehiculo' => $request->propietario_vehiculo,
                'estado_vehiculo' => $request->estado_vehiculo,
            ]);

            session()->flash('success', 'Vehiculo actualizado correctamente');

            DB::commit();

            return to_route('vehiculos.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo actualizar el vehiculo: ' . $th->getMessage());
        }
    }

    public function mantenimientos(Vehiculo $vehiculo)
    {
        $mantenimientos = Mantenimiento::where('vehiculo_id', $vehiculo->id)->get();

        return view('vehiculos.view', [
            'vehiculo' => $vehiculo,
            'mantenimientos' => $mantenimientos
        ]);
    }
}
