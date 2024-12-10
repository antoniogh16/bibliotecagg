<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Cliente;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book', 'cliente'])->get();
        return response()->json($loans);
    }

    public function store(Request $request)
    {
        $rules = [
            'libro_id' => 'required|exists:books,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|string|in:activo,completado,cancelado',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $loan = Loan::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Préstamo creado con éxito',
            'data' => $loan,
        ], 201);
    }

    public function show(Loan $loan)
    {
        return response()->json([
            'status' => true,
            'data' => $loan->load(['book', 'cliente']),
        ]);
    }

    public function update(Request $request, Loan $loan)
    {
        $rules = [
            'libro_id' => 'sometimes|exists:books,id',
            'cliente_id' => 'sometimes|exists:clientes,id',
            'fecha_prestamo' => 'sometimes|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|string|in:activo,completado,cancelado',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $loan->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Préstamo actualizado con éxito',
            'data' => $loan,
        ]);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Préstamo eliminado con éxito',
        ]);
    }
}
