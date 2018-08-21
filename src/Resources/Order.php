<?php

declare(strict_types=1);

namespace Padrio\Shopware\Resources;

use Padrio\Shopware\AbstractResource;
use Zend\Router\Http\RouteInterface;
use Zend\Router\Http\Segment;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Order extends AbstractResource
{
    public function getPath(): RouteInterface
    {
        return new Segment('/api/orders[/:resourceId]');
    }

    public function findOne($id, $useNumAsId = false)
    {
        return $this->request(['resourceId' => $id], ['useNumAsId' => true]);
    }

    function findBy(array $queryParameters = [])
    {
        return $this->request();
    }
}