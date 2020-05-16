<?php

namespace Module\Application;

use Module\Domain\User;
use Module\Domain\UserRepository;

class CreateUser
{
    /** @var UserRepository */
    private $repository;

    /**
     * SayHello constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     */
    public function __invoke(string $name)
    {
        $user = New User($name);
        $this->repository->store($user);
    }
}