<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,            // Genera un nombre aleatorio
            'apellido' => $this->faker->lastName,          // Genera un apellido aleatorio
            'correo' => $this->faker->unique()->safeEmail, // Genera un correo electrónico único
            'telefono' => $this->faker->phoneNumber,       // Genera un número de teléfono aleatorio
            'direccion' => $this->faker->address,          // Genera una dirección aleatoria
        ];
    }
}
