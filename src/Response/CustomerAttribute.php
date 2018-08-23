<?php

declare(strict_types=1);

namespace Padrio\Shopware\Response;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class CustomerAttribute implements ResourceResponseInterface
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $customerId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }
}