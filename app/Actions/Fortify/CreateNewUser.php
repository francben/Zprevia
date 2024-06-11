<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB   ;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
{
    return DB::transaction(function () use ($input) {
        // Validación
        $validatedData = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cif' => ['required', 'string', 'max:9', 'unique:companies'],
            'sector' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric'], // Cambiado a numérico
            'locality' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'rol_en_empresa' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Creación del usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Creación de la compañía
        $company = Company::create([
            'cif' => $validatedData['cif'],
            'name' => $validatedData['name'],
            'sector' => $validatedData['sector'],
            'address' => $validatedData['address'],
            'telephone' => $validatedData['telefono'],
            'locality' => $validatedData['locality'],
            'province' => $validatedData['province'],
            'email' => $validatedData['email'],
            'admin' => $user->id,
            'rol_en_empresa' => $validatedData['rol_en_empresa'],
        ]);

        return $user;
    });
}
}
