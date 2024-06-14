<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    use HasFactory;

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

}
