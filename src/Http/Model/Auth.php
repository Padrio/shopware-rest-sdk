<?php

declare(strict_types=1);

namespace Padrio\Shopware\Http\Model;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Auth
{
    const AUTH_DIGEST = 'digest';
    const AUTH_BASIC = 'basic';

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $authMethod = self::AUTH_BASIC;

    public function __construct($user, $apiKey, $authMethod = self::AUTH_BASIC)
    {
        $this->user = $user;
        $this->apiKey = $apiKey;
        $this->authMethod = $authMethod;
    }

    public static function createFromArray(array $data): Auth
    {
        return new self(
            $data['user'] ?? null,
            $data['apiKey'] ?? null,
            $data['authMethod'] ?? self::AUTH_BASIC
        );
    }

    public function getValues(): array
    {
        return [
            $this->user,
            $this->apiKey,
            $this->authMethod,
        ];
    }
}