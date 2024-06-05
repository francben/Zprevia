<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

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


    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer');
    }
}