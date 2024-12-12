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

    /**
     * @return mixed
     */
    public function users():Mixed
    {
        return User::paginate(15);
    }

    /**
     * @param User $user
     * @param array{name: string, email: string} $data The data required to create a commentaire.
     * @return bool
     */
    public function updateUser(User $user, array $data): bool
    {
        return (bool) $user->update($data);
    }

}
