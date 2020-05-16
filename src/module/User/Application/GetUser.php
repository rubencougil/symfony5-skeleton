<?php

namespace Module\User\Application;

use Module\User\Domain\User;
use Module\User\Domain\UserRepository;

class GetUser
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
     * @param string $id
     * @return User
     */
    public function __invoke(string $id): User
    {
        return $this->repository->get($id);
    }
}