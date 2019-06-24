<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Api\Data;

/**
 * Interface DealerInterface
 * @package Yireo\ExampleDealers\Api\Data
 */
interface DealerInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @param string $address
     * @return mixed
     */
    public function setAddress(string $address);
}
