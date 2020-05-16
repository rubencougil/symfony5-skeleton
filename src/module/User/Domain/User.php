<?php

namespace Module\User\Domain;

class User
{
    /** @var UserId */
    private $id;

    /** @var string */
    private $name;

    /**
     * User constructor.
     * @param UserId $id
     * @param string $name
     */
    public function __construct(UserId $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return UserId
     */
    public function id(): UserId
    {
        return $this->id;
    }
}