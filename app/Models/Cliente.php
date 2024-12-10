<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'phone','telefono',
        'direccion',];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
