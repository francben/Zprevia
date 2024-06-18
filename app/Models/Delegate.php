<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    use HasFactory;
    // Clave primaria
    protected $primaryKey = 'id';

    public $timestamps = false;
    
    protected $table = 'delegates';

    protected $fillable = [
        'dni',
        'name',
        'user',
        'company',
        'telephone',
        'position',
        'photo',
    ];

    // Relación inversa: Un delegado pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Un delegado pertenece a una compañía
    public function companies()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }

    // Relación: Un delegado puede estar asociado a varios eventos
    public function events()
    {
        return $this->belongsToMany(Event::class, 'delegate_events', 'delegate', 'event')
                    ->withPivot('paid'); // Pivot table y columnas adicionales
    }

}
