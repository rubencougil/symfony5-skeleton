<?php

namespace Module\User\Application;


use Module\User\Domain\User;
use Module\User\Domain\UserId;
use Module\User\Domain\UserRepository;

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
        $user = New User(new UserId(), $name);
        $this->repository->store($user);
    }
}