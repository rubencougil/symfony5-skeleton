<?php

namespace Module\User\Application;


use Module\User\Domain\User;
use Module\User\Domain\UserCreated;
use Module\User\Domain\UserId;
use Module\User\Domain\UserRepository;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateUser
{
    /** @var UserRepository */
    private $repository;

    /** @var MessageBusInterface */
    private $bus;

    /**
     * SayHello constructor.
     * @param UserRepository $repository
     * @param MessageBusInterface $bus
     */
    public function __construct(UserRepository $repository, MessageBusInterface $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    /**
     * @param string $name
     */
    public function __invoke(string $name)
    {
        $user = New User(new UserId(), $name);
        $this->repository->store($user);
        $this->bus->dispatch(new UserCreated($user));
    }
}