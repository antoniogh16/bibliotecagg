<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();
        return response()->json($personal);
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:personal,correo|max:255',
            'telefono' => 'nullable|string|max:15',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $personal = Personal::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Empleado creado con éxito',
            'data' => $personal,
        ], 201);
    }

    public function show(Personal $personal)
    {
        return response()->json([
            'status' => true,
            'data' => $personal,
        ]);
    }

    public function update(Request $request, Personal $personal)
    {
        $rules = [
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'correo' => 'sometimes|email|unique:personal,correo,' . $personal->id . '|max:255',
            'telefono' => 'nullable|string|max:15',
            'puesto' => 'sometimes|string|max:255',
            'fecha_contratacion' => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $personal->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Empleado actualizado con éxito',
            'data' => $personal,
        ]);
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();

        return response()->json([
            'status' => true,
            'message' => 'Empleado eliminado con éxito',
        ]);
    }
}
