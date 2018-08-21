<?php

declare(strict_types=1);

namespace Padrio\Shopware;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Padrio\Shopware\Http\Model\Auth;
use Padrio\Shopware\Response\ResourceResponseInterface;
use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\Reflection;
use Zend\Router\Http\RouteInterface;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
abstract class AbstractResource
{
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var Auth
     */
    private $auth;

    public function __construct(ClientInterface $client, Auth $auth, HydratorInterface $hydrator = null)
    {
        $this->client = $client;
        $this->auth = $auth;
        $this->hydrator = $hydrator ?? new Reflection();
    }

    /**
     * Returns the resources path to call as Segment
     *
     * @return RouteInterface
     */
    abstract function getPath(): RouteInterface;

    /**
     * Find a single resource
     *
     * @param      $id
     * @param bool $useNumAsId  This tells the API to query the order's data by its number,
     *                          instead of its actual identifier. Otherwise, the syntax is just /api/orders/id.
     *                          It's not possible to provide both parameter at the same time.
     *
     * @return  ResourceResponseInterface
     */
    abstract function findOne($id, $useNumAsId = false);

    /**
     * Fetch a resource collection which can be filtered using query parameters.
     *
     * @param array $queryParameters
     *
     * @return mixed
     */
    abstract function findBy(array $queryParameters = []);

    protected function request(array $routeParameters = [], array $queryParameters = [])
    {
        $uri = $this->getPath()->assemble($routeParameters);
        $response = $this->client->request('GET', $uri, [
            'auth' => $this->auth->getValues(),
            'query' => $queryParameters,
        ]);

        return $response;
    }

    /**
     * @param array  $data
     * @param object $object
     *
     * @return object
     */
    protected function hydrate(array $data, $object)
    {
        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * @param object $object
     *
     * @return array
     */
    protected function extract($object)
    {
        return $this->hydrator->extract($object);
    }

    public function getHydrator(): HydratorInterface
    {
        return $this->hydrator;
    }

    public function setHydrator(HydratorInterface $hydrator): void
    {
        $this->hydrator = $hydrator;
    }
}