<?php

declare(strict_types=1);

namespace Padrio\Shopware\Hydrator\Strategy;
use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\Reflection;
use Zend\Hydrator\Strategy\StrategyInterface;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class RecursiveHydration implements StrategyInterface
{
    /**
     * @var object
     */
    private $object;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @param object                    $object
     * @param HydratorInterface|null    $hydrator
     */
    public function __construct($object, HydratorInterface $hydrator = null)
    {
        $this->object = $object;

        if($hydrator === null) {
            $hydrator = new Reflection();
        }
        $this->hydrator = $hydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($value)
    {
        if($value === null) {
            return [];
        }

        return $this->hydrator->extract($value);
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        return $this->hydrator->hydrate($value, $cloned);
    }
}