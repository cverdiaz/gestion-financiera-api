<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Transaccion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:ingreso,gasto',
            'monto' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
        ]);

        $transaccion = Transaccion::create($request->all());

        return response()->json($transaccion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Transaccion::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo' => 'required|in:ingreso,gasto',
            'monto' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
        ]);

        $transaccion = Transaccion::findOrFail($id);
        $transaccion->update($request->all());

        return response()->json($transaccion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $transaccion->delete();

        return response()->json(null, 204);
    }
}
