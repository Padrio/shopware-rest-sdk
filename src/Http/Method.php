<?php

declare(strict_types=1);

namespace Padrio\Shopware\Http;

use Padrio\Shopware\Exception\MethodNotAllowed;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Method
{
    const METHOD_GET = 'GET';
    const METHOD_GET_COLLECTION = 'GET_COLLECTION';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';
    const METHOD_PUT = 'PUT';

    /**
     * Check if currently used method is allowed and transform it
     *
     * @param string $method HTTP Method
     * @param array  $allowed
     *
     * @return string
     * @throws MethodNotAllowed
     */
    public static function isAllowed(string $method, array $allowed): string
    {
        if(!in_array($method, $allowed)) {
            throw MethodNotAllowed::createFromMethod($method);
        }

        if($method === self::METHOD_GET_COLLECTION) {
            return self::METHOD_GET;
        }

        return $method;
    }
}