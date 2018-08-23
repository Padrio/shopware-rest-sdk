<?php

declare(strict_types=1);

namespace Padrio\Shopware\Exception;

use Exception;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class DecodeJsonResponse extends Exception
{
    public static function createFromJsonError(string $message, int $code)
    {
        return new self('Failed to decode JSON Response: '. $message, $code);
    }
}