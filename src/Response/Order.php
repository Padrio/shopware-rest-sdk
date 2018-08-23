<?php

declare(strict_types=1);

namespace Padrio\Shopware\Response;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Order implements ResourceResponseInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var int
     */
    private $paymentId;

    /**
     * @var int
     */
    private $dispatchId;

    /**
     * @var string
     */
    private $partnerId;

    /**
     * @var int
     */
    private $shopId;

    /**
     * @var double
     */
    private $invoiceAmount;

    /**
     * @var double
     */
    private $invoiceAmountNet;

    /**
     * @var int
     */
    private $invoiceShipping;

    /**
     * @var int
     */
    private $invoiceShippingNet;

    /**
     * @var string
     */
    private $orderTime;

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $customerComment;

    /**
     * @var string
     */
    private $internalComment;

    /**
     * @var int
     */
    private $net;

    /**
     * @var int
     */
    private $taxFree;

    /**
     * @var string
     */
    private $temporaryId;

    /**
     * @var string
     */
    private $referer;

    /**
     * @var
     */
    private $clearedDate;

    /**
     * @var string
     */
    private $trackingCode;

    /**
     * @var string
     */
    private $languageIso;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $currencyFactor;

    /**
     * @var string
     */
    private $remoteAddress;

    /**
     * @var string
     */
    private $deviceType;

    /**
     * @var array
     */
    private $attribute;

    /**
     * @var CustomerAttribute
     */
    private $customer;

    /**
     * @var int
     */
    private $paymentStatusId;

    /**
     * @var int
     */
    private $orderStatusId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
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

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     */
    public function setPaymentId(int $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getDispatchId(): int
    {
        return $this->dispatchId;
    }

    /**
     * @param int $dispatchId
     */
    public function setDispatchId(int $dispatchId): void
    {
        $this->dispatchId = $dispatchId;
    }

    /**
     * @return string
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
    }

    /**
     * @param string $partnerId
     */
    public function setPartnerId(string $partnerId): void
    {
        $this->partnerId = $partnerId;
    }

    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * @param int $shopId
     */
    public function setShopId(int $shopId): void
    {
        $this->shopId = $shopId;
    }

    /**
     * @return float
     */
    public function getInvoiceAmount(): float
    {
        return $this->invoiceAmount;
    }

    /**
     * @param float $invoiceAmount
     */
    public function setInvoiceAmount(float $invoiceAmount): void
    {
        $this->invoiceAmount = $invoiceAmount;
    }

    /**
     * @return float
     */
    public function getInvoiceAmountNet(): float
    {
        return $this->invoiceAmountNet;
    }

    /**
     * @param float $invoiceAmountNet
     */
    public function setInvoiceAmountNet(float $invoiceAmountNet): void
    {
        $this->invoiceAmountNet = $invoiceAmountNet;
    }

    /**
     * @return int
     */
    public function getInvoiceShipping(): int
    {
        return $this->invoiceShipping;
    }

    /**
     * @param int $invoiceShipping
     */
    public function setInvoiceShipping(int $invoiceShipping): void
    {
        $this->invoiceShipping = $invoiceShipping;
    }

    /**
     * @return int
     */
    public function getInvoiceShippingNet(): int
    {
        return $this->invoiceShippingNet;
    }

    /**
     * @param int $invoiceShippingNet
     */
    public function setInvoiceShippingNet(int $invoiceShippingNet): void
    {
        $this->invoiceShippingNet = $invoiceShippingNet;
    }

    /**
     * @return string
     */
    public function getOrderTime(): string
    {
        return $this->orderTime;
    }

    /**
     * @param string $orderTime
     */
    public function setOrderTime(string $orderTime): void
    {
        $this->orderTime = $orderTime;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getCustomerComment(): string
    {
        return $this->customerComment;
    }

    /**
     * @param string $customerComment
     */
    public function setCustomerComment(string $customerComment): void
    {
        $this->customerComment = $customerComment;
    }

    /**
     * @return string
     */
    public function getInternalComment(): string
    {
        return $this->internalComment;
    }

    /**
     * @param string $internalComment
     */
    public function setInternalComment(string $internalComment): void
    {
        $this->internalComment = $internalComment;
    }

    /**
     * @return int
     */
    public function getNet(): int
    {
        return $this->net;
    }

    /**
     * @param int $net
     */
    public function setNet(int $net): void
    {
        $this->net = $net;
    }

    /**
     * @return int
     */
    public function getTaxFree(): int
    {
        return $this->taxFree;
    }

    /**
     * @param int $taxFree
     */
    public function setTaxFree(int $taxFree): void
    {
        $this->taxFree = $taxFree;
    }

    /**
     * @return string
     */
    public function getTemporaryId(): string
    {
        return $this->temporaryId;
    }

    /**
     * @param string $temporaryId
     */
    public function setTemporaryId(string $temporaryId): void
    {
        $this->temporaryId = $temporaryId;
    }

    /**
     * @return string
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * @param string $referer
     */
    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
    }

    /**
     * @return mixed
     */
    public function getClearedDate()
    {
        return $this->clearedDate;
    }

    /**
     * @param mixed $clearedDate
     */
    public function setClearedDate($clearedDate): void
    {
        $this->clearedDate = $clearedDate;
    }

    /**
     * @return string
     */
    public function getTrackingCode(): string
    {
        return $this->trackingCode;
    }

    /**
     * @param string $trackingCode
     */
    public function setTrackingCode(string $trackingCode): void
    {
        $this->trackingCode = $trackingCode;
    }

    /**
     * @return string
     */
    public function getLanguageIso(): string
    {
        return $this->languageIso;
    }

    /**
     * @param string $languageIso
     */
    public function setLanguageIso(string $languageIso): void
    {
        $this->languageIso = $languageIso;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getCurrencyFactor(): int
    {
        return $this->currencyFactor;
    }

    /**
     * @param int $currencyFactor
     */
    public function setCurrencyFactor(int $currencyFactor): void
    {
        $this->currencyFactor = $currencyFactor;
    }

    /**
     * @return string
     */
    public function getRemoteAddress(): string
    {
        return $this->remoteAddress;
    }

    /**
     * @param string $remoteAddress
     */
    public function setRemoteAddress(string $remoteAddress): void
    {
        $this->remoteAddress = $remoteAddress;
    }

    /**
     * @return string
     */
    public function getDeviceType(): string
    {
        return $this->deviceType;
    }

    /**
     * @param string $deviceType
     */
    public function setDeviceType(string $deviceType): void
    {
        $this->deviceType = $deviceType;
    }

    /**
     * @return array
     */
    public function getAttribute(): array
    {
        return $this->attribute;
    }

    /**
     * @param array $attribute
     */
    public function setAttribute(array $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @return CustomerAttribute
     */
    public function getCustomer(): CustomerAttribute
    {
        return $this->customer;
    }

    /**
     * @param CustomerAttribute $customer
     */
    public function setCustomer(CustomerAttribute $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getPaymentStatusId(): int
    {
        return $this->paymentStatusId;
    }

    /**
     * @param int $paymentStatusId
     */
    public function setPaymentStatusId(int $paymentStatusId): void
    {
        $this->paymentStatusId = $paymentStatusId;
    }

    /**
     * @return int
     */
    public function getOrderStatusId(): int
    {
        return $this->orderStatusId;
    }

    /**
     * @param int $orderStatusId
     */
    public function setOrderStatusId(int $orderStatusId): void
    {
        $this->orderStatusId = $orderStatusId;
    }
}