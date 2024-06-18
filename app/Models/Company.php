<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'companies';

    // Clave primaria
    protected $primaryKey = 'id';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'cif',
        'name',
        'description',
        'sector',
        'address',
        'telephone',
        'locality',
        'province',
        'email',
        'profile',
        'dni',
        'logo',
        'video',
        'admin',
        'cover',
        'portafolio' 
    ];

    // Especificar si la clave primaria es incremental
    public $incrementing = true;

    // Especificar el tipo de clave primaria si no es un entero
    protected $keyType = 'int';

    // Deshabilitar timestamps si no se utilizan (created_at, updated_at)
    public $timestamps = false;

    // Tipos de datos de las columnas
    protected $casts = [
        'admin' => 'integer',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'admin');
    }
    // Relación: Una compañía puede tener un organizador
    public function organizers()
    {
        return $this->hasMany(Organizer::class);
    }
    // Relación: Una compañía puede tener varios delegados
    public function delegates()
    {
        return $this->hasMany(Delegate::class, 'company_id', 'id');
    }
    // Relación: Una compañía puede tener varios turnos
    public function turnos()
    {
        return $this->hasMany(Turn::class, 'company_id', 'id');
    }
    // Relación: Una compañía puede tener varias solicitudes de entrevistas
    public function entrevistas()
    {
        return $this->hasMany(Entrevista::class, 'company_id');
    }
}