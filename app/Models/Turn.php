<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    // Nombre de la tabla
    protected $table = 'turns';

    // Clave primaria
    protected $primaryKey = 'id';
    
    // maneja el tiempo
    public $timestamps = true;
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'time',
        'event'
    ];

}
