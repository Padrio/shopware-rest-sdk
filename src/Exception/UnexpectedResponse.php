<?php

declare(strict_types=1);

namespace Padrio\Shopware\Exception;

use Exception;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class UnexpectedResponse extends Exception
{
    public static function createFromStatusCode(int $statusCode): UnexpectedResponse
    {
        return new self(
            'API Returned unexpected Response',
            $statusCode
        );
    }
}