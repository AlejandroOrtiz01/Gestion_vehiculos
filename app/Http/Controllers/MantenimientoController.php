<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::all();
        
        return view('mantenimientos.index', [
            'mantenimientos' => $mantenimientos
        ]);
    }

    public function create()
    {
        $vehiculos = Vehiculo::where('estado_vehiculo', '!=', 0)->get();
        
        return view('mantenimientos.create', [
            'vehiculos' => $vehiculos
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'vehiculo_id' => 'required',
                'fecha_mantenimiento' => 'required',
                'kilometraje_mantenimiento' => 'required',
                'tipo_mantenimiento' => 'required',
                'costo_mantenimiento' => 'required',
                'descripcion_mantenimiento' => 'required',
            ]);

            Mantenimiento::create([
                'vehiculo_id' => $request->vehiculo_id,
                'fecha_mantenimiento' => $request->fecha_mantenimiento,
                'kilometraje_mantenimiento' => $request->kilometraje_mantenimiento,
                'tipo_mantenimiento' => $request->tipo_mantenimiento,
                'costo_mantenimiento' => $request->costo_mantenimiento,
                'descripcion_mantenimiento' => $request->descripcion_mantenimiento,
            ]);

            session()->flash('success', 'Matenimiento creada correctamente');

            DB::commit();

            return to_route('mantenimientos.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo crear el matenimiento: ' . $th->getMessage());
        }
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        $vehiculos = Vehiculo::where('estado_vehiculo', '!=', 0)->get();

        return view('mantenimientos.edit', [
            'mantenimiento' => $mantenimiento,
            'vehiculos' => $vehiculos
        ]);
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'vehiculo_id' => 'required',
                'fecha_mantenimiento' => 'required',
                'kilometraje_mantenimiento' => 'required',
                'tipo_mantenimiento' => 'required',
                'costo_mantenimiento' => 'required',
                'descripcion_mantenimiento' => 'required',
            ]);

            $mantenimiento->update([
                'vehiculo_id' => $request->vehiculo_id,
                'fecha_mantenimiento' => $request->fecha_mantenimiento,
                'kilometraje_mantenimiento' => $request->kilometraje_mantenimiento,
                'tipo_mantenimiento' => $request->tipo_mantenimiento,
                'costo_mantenimiento' => $request->costo_mantenimiento,
                'descripcion_mantenimiento' => $request->descripcion_mantenimiento,
            ]);

            session()->flash('success', 'Matenimiento actualizado correctamente');

            DB::commit();

            return to_route('mantenimientos.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo actualizar el matenimiento: ' . $th->getMessage());
        }
    }
}
