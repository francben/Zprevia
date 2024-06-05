<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $table = 'organizers';

    protected $fillable = [
        'company',
        'active',
        'subscription',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relación con el modelo Event
    public function events()
    {
        return $this->hasMany(Event::class, 'organizer');
    }

    // Relación con el modelo Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company');
    }
}