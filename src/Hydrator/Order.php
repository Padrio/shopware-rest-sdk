<?php

declare(strict_types=1);

namespace Padrio\Shopware\Hydrator;

use Padrio\Shopware\Hydrator\Strategy\RecursiveHydration;
use Padrio\Shopware\Response\CustomerAttribute;
use Zend\Hydrator\Reflection;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Order extends Reflection
{
    public function __construct()
    {
        parent::__construct();
        $this->addStrategy('customer', new RecursiveHydration(new CustomerAttribute()));
    }
}