<?php

namespace Database\Factories;

use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    protected $model = Personal::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'correo' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->optional()->phoneNumber,
            'puesto' => $this->faker->jobTitle,
            'fecha_contratacion' => $this->faker->optional()->date(),
        ];
    }
}
