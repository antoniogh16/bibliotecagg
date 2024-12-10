<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:255',
            'apellido' => 'required|string|min:1|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $cliente = Cliente::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Cliente creado con éxito',
            'data' => $cliente,
        ], 201);
    }

    public function show(Cliente $cliente)
    {
        return response()->json(['status' => true, 'data' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:255',
            'apellido' => 'required|string|min:1|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $cliente->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Cliente actualizado con éxito',
            'data' => $cliente,
        ], 200);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json([
            'status' => true,
            'message' => 'Cliente eliminado con éxito',
        ], 200);
    }
}
