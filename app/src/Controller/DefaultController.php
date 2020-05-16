<?php

namespace App\Controller;

use Module\SayHello;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController
{
    /** @var SayHello */
    private $sayHello;

    /**
     * DefaultController constructor.
     * @param SayHello $sayHello
     */
    public function __construct(SayHello $sayHello)
    {
        $this->sayHello = $sayHello;
    }


    public function __invoke(Request $req): JsonResponse
    {
        return new JsonResponse([
            'status' => $this->sayHello->__invoke(),
            'uri' => $req->getUri()
        ]);
    }
}
