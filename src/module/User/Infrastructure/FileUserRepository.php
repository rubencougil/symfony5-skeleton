<?php

namespace Module\User\Infrastructure;

use Module\User\Domain\User;
use Module\User\Domain\UserId;
use Module\User\Domain\UserRepository;

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
     * @param string $name
     * @return User
     */
    public function get(string $name): User
    {
        return new User(new UserId(), $name);
    }
}