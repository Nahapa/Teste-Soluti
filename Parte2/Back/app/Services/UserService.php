<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getUsersAll(): Collection
    {
        return User::all();
    }

    public function getUserById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function newUser(array $data): User
    {
        return User::create([
            'name'      => $data['name'],
            'cpf'       => $data['cpf'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'password'  => Hash::make($data['password'])
        ]);
    }

    public function updateUserById(int $id, array $data): User
    {
        $data = [
            'name'      => $data['name'],
            'cpf'       => $data['cpf'],
            'email'     => $data['email'],
            'phone'     => $data['phone']
        ];

        // A senha só será sobrescrita se não for vazia, assim quando vier vazia não sobrescrevendo a senha com conteúdo vazio.
        if (!empty($data['password']))
            $data['password'] = Hash::make($data['password']);

        User::find($id)->update($data);

        return User::find($id);
    }

    public function deleteUserById(int $id): void
    {
        User::find($id)->delete();
    }
}
