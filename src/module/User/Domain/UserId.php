<?php

namespace Module\User\Domain;

use Ramsey\Uuid\Uuid;

class UserId
{
    /** @var string */
    private $id;

    /**
     * UserId constructor.
     */
    public function __construct()
    {
        $uuid = Uuid::uuid4();
        $this->id = $uuid;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}