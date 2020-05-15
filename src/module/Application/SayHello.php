<?php

namespace Module\Application;

use Module\Domain\User;
use Module\Infrastructure\Repository;

class SayHello
{
    /** @var Repository */
    private $repository;

    /**
     * SayHello constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $user = new User('Mike');
        $this->repository->store();
        return "Hello {$user->name()}";
    }
}