<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        return [
            'libro_id' => Book::factory(),            // Genera un libro aleatorio
            'cliente_id' => Cliente::factory(),      // Genera un cliente aleatorio
            'fecha_prestamo' => $this->faker->dateTimeBetween('-1 month', 'now'), // Fecha de préstamo
            'fecha_devolucion' => $this->faker->optional()->dateTimeBetween('now', '+1 month'), // Fecha de devolución opcional
            'estado' => $this->faker->randomElement(['activo', 'completado', 'cancelado']), // Estado aleatorio
        ];
    }
}
