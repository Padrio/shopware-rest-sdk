<?php

declare(strict_types=1);

namespace Padrio\Shopware\Exception;

use Exception;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class MethodNotAllowed extends Exception
{
    public static function createFromMethod(string $method): MethodNotAllowed
    {
        $message = sprintf('Method %s is not allowed.', $method);
        return new self($message);
    }
}