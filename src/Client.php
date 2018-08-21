<?php

declare(strict_types=1);

namespace Padrio\Shopware;

use GuzzleHttp\ClientInterface;
use Padrio\Shopware\Http\Model\Auth;
use Padrio\Shopware\Resources\Order;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
final class Client
{
    /**
     * @var string
     */
    private $baseUrl;


    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var Auth
     */
    private $auth;

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        if(!$this->client) {
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->baseUrl,
            ]);
        }

        return $this->client;
    }

    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    public function __construct($baseUrl, $user, $apiKey, $authMethod = Auth::AUTH_BASIC)
    {
        $this->baseUrl = $baseUrl;
        $this->auth = new Auth($user, $apiKey, $authMethod);
    }

    public function getOrderResource(): Order
    {
        return new Order($this->getClient(), $this->auth);
    }
}