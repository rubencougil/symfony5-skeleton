<?php

namespace App\Controller\User;

use Module\User\Application\GetUser;
use Module\User\Application\CreateUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    /** @var CreateUser */
    private $createUser;

    /** @var GetUser */
    private $getUser;

    /**
     * UserController constructor.
     * @param CreateUser $createUser
     * @param GetUser $getUser
     */
    public function __construct(CreateUser $createUser, GetUser $getUser)
    {
        $this->createUser = $createUser;
        $this->getUser = $getUser;
    }


    public function create(Request $req): JsonResponse
    {
        $name = json_decode($req->getContent(), true)['name'];
        $this->createUser->__invoke($name);
        return new JsonResponse();
    }

    public function get(string $id): JsonResponse
    {
        $user = $this->getUser->__invoke($id);
        return new JsonResponse([
            'name' => $user->name()
        ]);
    }
}
