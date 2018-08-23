<?php

declare(strict_types=1);

namespace Padrio\Shopware\Resources;

use Padrio\Shopware\AbstractResource;
use Padrio\Shopware\Hydrator\Order as OrderHydrator;
use Padrio\Shopware\Response\Order as OrderResponse;
use Padrio\Shopware\Response\ResourceResponseInterface;
use Zend\Hydrator\HydratorInterface;
use Zend\Router\Http\RouteInterface;
use Zend\Router\Http\Segment;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Order extends AbstractResource
{
    /**
     * {@inheritdoc}
     */
    public function getPath(): RouteInterface
    {
        return new Segment('orders[/:resourceId]');
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseObject(): ResourceResponseInterface
    {
        return new OrderResponse();
    }

    /**
     * {@inheritdoc}
     */
    public function getHydrator(): HydratorInterface
    {
        return new OrderHydrator();
    }

    /**
     * {@inheritdoc}
     */
    public function findOne($id, $useNumAsId = false)
    {
        return $this->request(['resourceId' => $id], ['useNumAsId' => true]);
    }

    /**
     * {@inheritdoc}
     */
    function findBy(array $queryParameters = [])
    {
        return $this->request([], ['useNumAsId' => true] + $queryParameters);
    }
}