<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:200'],
            'ap' => ['required', 'string', 'max:200'],
            'am' => ['required', 'string', 'max:200'],
            'curp' => ['required', 'string', 'max:200', 'unique:users'],
            'telefono' => ['required', 'string', 'max:200', 'unique:users'],
            'id_estado' => ['required', 'int', 'max:11'],
            'id_municipio' => ['required', 'int', 'max:11'],
            'id_localidad' => ['required', 'int', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'ap' => $input['ap'],
            'am' => $input['am'],
            'curp' => $input['curp'],
            'telefono' => $input['telefono'],
            'id_estado' => $input['id_estado'],
            'id_municipio' => $input['id_municipio'],
            'id_localidad' => $input['id_localidad'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
