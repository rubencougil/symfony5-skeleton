<?php

declare(strict_types=1);

namespace Test\Application\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Exception;
use http\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
final class DemoContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /** @var Response|null */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When a demo scenario sends a request to :path
     * @param string $path
     * @throws Exception
     */
    public function aDemoScenarioSendsARequestTo(string $path): void
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived(): void
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @When I create request for a new user with name :name
     * @param string $name
     * @throws Exception
     */
    public function iCreateRequestForANewUserWithName(string $name): void
    {
        $request = Request::create('/users', Request::METHOD_POST, [], [], [], [], json_encode(['name' => $name]));
        $this->response = $this->kernel->handle($request);
        if ($this->response->getStatusCode() !== Response::HTTP_OK) {
            throw new \RuntimeException("Status Code is {$this->response->getStatusCode()}");
        }
    }

    /**
     * @Then I should have a new user with name :name
     * @param string $name
     * @throws Exception
     */
    public function iShouldHaveANewUserWithName(string $name): void
    {
        $request = Request::create("/users/$name", Request::METHOD_GET);
        $this->response = $this->kernel->handle($request);
        if ($this->response->getStatusCode() !== Response::HTTP_OK) {
            throw new \RuntimeException("User not found {$this->response->getStatusCode()}");
        }

        $resJson = json_decode($this->response->getContent(), true);
        if ($resJson['name'] !== $name) {
            throw new \RuntimeException("User not found {$this->response->getStatusCode()}");
        }
    }
}
