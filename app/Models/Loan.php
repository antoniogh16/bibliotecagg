<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'libro_id',
        'cliente_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'libro_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
