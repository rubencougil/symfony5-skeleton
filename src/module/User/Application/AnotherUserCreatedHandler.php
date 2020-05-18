<?php

namespace Module\User\Application;

use Module\User\Domain\UserCreated;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class AnotherUserCreatedHandler implements MessageHandlerInterface
{
    public function __invoke(UserCreated $event)
    {
    }
}