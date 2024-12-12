<?php

namespace App\Http\Repositories;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{


    public function findUserByEmail(String $email): User | null
    {
        return User::where('email', $email)->first();
    }

    public function find(int $id): User|null {
        return User::find($id);
    }

    public function users()
    {
        return User::paginate(15);
    }

    public function updateUser(User $user, array $data): bool
    {
        return $user->update($data);
    }

}
