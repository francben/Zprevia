<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegate_events extends Model
{
    use HasFactory;

    protected $table = 'delegate_events';
        
    public $timestamps = false;

    protected $fillable = [
        'event',
        'delegate',
        'paid',
        'ticket',
    ];
}
