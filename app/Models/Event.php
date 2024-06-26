<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    // Clave primaria
    protected $primaryKey = 'id';
    protected $table = 'events';

    protected $fillable = [
        'name',
        'date',
        'locality',
        'place',
        'max_tables',
        'organizer',
        'banner',
        'description',
        'active',
        'request_time',
        'price',
    ];

    protected $casts = [
        'date' => 'datetime',
        'active' => 'boolean',
    ];

    // maneja el tiempo
    public $timestamps = true;

    // Relación; un evento tiene un organizardor
    public function organizers()
    {
        return $this->belongsTo(Organizer::class, 'organizer');
    }
    // Relación: Un evento puede tener varios delegados
    public function delegates()
    {
        return $this->belongsToMany(Delegate::class, 'delegate_events', 'event', 'delegate')
                    ->withPivot('paid'); // Pivot table y columnas adicionales
    }

}