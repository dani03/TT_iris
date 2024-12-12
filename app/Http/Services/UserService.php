<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * récupération d'un user
     * @param int $userId
     * @return User|null
     */
    public function getUser(int $userId)
    {
        return $this->userRepository->find($userId);

    }

}
