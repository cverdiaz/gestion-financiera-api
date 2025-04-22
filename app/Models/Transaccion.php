<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaccion extends Model
{
    use HasFactory;
    
    protected $table = 'transacciones'; // 👈 especificar nombre correcto
    protected $fillable = ['tipo', 'monto', 'descripcion', 'fecha'];
}
