<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Relación con el modelo Company
    public function company()
    {
        return $this->hasMany(Company::class, 'admin');
    }
    // Relación: Un usuario puede ser un delegado
    public function delegate()
    {
        return $this->hasOne(Delegate::class, 'user');
    }

    public function hasPermission($action, $company_id)
    {
        switch ($action) {
            case 'admin':
                return $this->isAdminOfCompany($company_id);
            case 'delegate':
                return $this->isDelegateOfCompany($company_id);
            default:
                return false;
        }
    }
    // Verificar si el usuario es el administrador de la empresa
    protected function isAdminOfCompany($companyId)
    {
        return $this->company()->where('id', $companyId)->where('admin', $this->id)->exists();
    }

    // Verificar si el usuario es un delegado asociado a la empresa
    protected function isDelegateOfCompany($companyId)
    {
        return Delegate::where('company', $companyId)->where('user', $this->id)->exists();
    }
}
