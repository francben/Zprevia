<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    use HasFactory;
    // Clave primaria
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $table = 'entrevista';

    protected $fillable = [
        'event_id',
        'company_id',
        'representante_id',
        'company_solicitante_id',
        'solicitante_id',
        'turno_id',
        'mesa',
        'estado',
    ];


    // Relación: Una entrevista pertenece a una compañía
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function company_solicitante()
    {
        return $this->belongsTo(Company::class, 'company_solicitante_id');
    }

    // Relación: Una entrevista pertenece a un representante
    public function representante()
    {
        return $this->belongsTo(Delegate::class, 'representante_id');
    }

    // Relación: Una entrevista pertenece a un solicitante
    public function solicitante()
    {
        return $this->belongsTo(Delegate::class, 'solicitante_id');
    }

    // Relación: Una entrevista pertenece a un turno
    public function turno()
    {
        return $this->belongsTo(Turn::class, 'turno_id');
    }

    // Relación: Una entrevista puede estar asociado a un evento
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
