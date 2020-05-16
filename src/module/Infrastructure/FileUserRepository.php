<?php

namespace Module\Infrastructure;

use Module\Domain\User;
use Module\Domain\UserRepository;

class FileUserRepository implements UserRepository
{
    /**
     * @param User $user
     */
    public function store(User $user): void
    {
        // TODO: Implement store() method.
    }

    /**
     * @param string $id
     * @return User
     */
    public function get(string $id): User
    {
        return new User($id);
    }
}