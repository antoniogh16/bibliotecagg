<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'puesto',
        'fecha_contratacion',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
    ];
}
