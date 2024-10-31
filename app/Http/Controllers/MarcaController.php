<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        
        return view('marcas.index', [
            'marcas' => $marcas
        ]);
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'nombre_marca' => 'required|max:75',
                'descripcion_marca' => 'nullable|max:150',
            ]);

            Marca::create([
                'nombre_marca' => $request->nombre_marca,
                'descripcion_marca' => $request->descripcion_marca
            ]);

            session()->flash('success', 'Marca creada correctamente');

            DB::commit();

            return to_route('marcas.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo crear la marca: ' . $th->getMessage());
        }
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', [
            'marca' => $marca
        ]);
    }

    public function update(Request $request, Marca $marca)
    {
        DB::beginTransaction();
        
        try {
            $this->validate($request, [
                'nombre_marca' => 'required|max:75',
                'descripcion_marca' => 'nullable|max:150',
            ]);
            
            $marca->update([
                'nombre_marca' => $request->nombre_marca,
                'descripcion_marca' => $request->descripcion_marca
            ]);

            session()->flash('success', 'Marca actualizada correctamente');

            DB::commit();

            return to_route('marcas.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'No se pudo actualizar la marca: ' . $th->getMessage());
        }
    }
}
