<?php

namespace Module\User\Domain;

interface UserRepository
{
    public function store(User $user): void;
    public function get(string $id): User;
}
