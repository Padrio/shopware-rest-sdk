<?php

declare(strict_types=1);

namespace Padrio\Shopware;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Padrio\Shopware\Exception\DecodeJsonResponse;
use Padrio\Shopware\Exception\UnexpectedResponse;
use Padrio\Shopware\Http\Model\Auth;
use Padrio\Shopware\Response\ResourceResponseInterface;
use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\Reflection;
use Zend\Router\Http\RouteInterface;
use Psr\Http\Message\ResponseInterface;

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
     * Returns Response object to hydrate into
     * @return ResourceResponseInterface
     */
    abstract function getResponseObject(): ResourceResponseInterface;

    /**
     * Returns a hydrator which will be used.
     * Can be overwritten by a child.
     *
     * @return HydratorInterface
     */
    public function getHydrator(): HydratorInterface
    {
        return $this->hydrator;
    }

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

    /**
     * @param array $routeParameters
     * @param array $queryParameters
     *
     * @return ResourceResponseInterface[]
     * @throws DecodeJsonResponse
     * @throws UnexpectedResponse
     * @throws GuzzleException
     */
    protected function request(array $routeParameters = [], array $queryParameters = [])
    {
        $uri = $this->getPath()->assemble($routeParameters);

        $response = $this->client->request('GET', $uri, [
            'auth' => $this->auth->getValues(),
            'query' => $queryParameters,
        ]);

        $this->checkExpectedStatusCode($response);
        $resources = $this->decodeResponse($response);

        return array_map(function($resource) {
            return $this->hydrate($resource);
        }, $resources['data'] ?? []);
    }

    /**
     * @param ResponseInterface $response
     * @param array             $statusCodes
     *
     * @return bool
     * @throws UnexpectedResponse
     */
    private function checkExpectedStatusCode(ResponseInterface $response, $statusCodes = [200]): bool
    {
        if(!in_array($response->getStatusCode(), $statusCodes)) {
            throw UnexpectedResponse::createFromStatusCode($response->getStatusCode());
        }

        return true;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     * @throws DecodeJsonResponse
     */
    private function decodeResponse(ResponseInterface $response): array
    {
        $content = $response->getBody()->getContents();
        $decoded = json_decode($content, true);

        if($decoded === false) {
            throw DecodeJsonResponse::createFromJsonError(json_last_error_msg(), json_last_error());
        }

        return $decoded;
    }

    /**
     * @param array  $data
     *
     * @return ResourceResponseInterface
     */
    protected function hydrate(array $data): ResourceResponseInterface
    {
        return $this->getHydrator()->hydrate($data, $this->getResponseObject());
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

    public function setHydrator(HydratorInterface $hydrator): void
    {
        $this->hydrator = $hydrator;
    }
}