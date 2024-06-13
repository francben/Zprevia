<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisoL extends Model
{
    use HasFactory;

    protected $table = 'aviso_legal';

    protected $fillable = [
        'content',
    ];

}