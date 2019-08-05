<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Model;

use Magento\Framework\Model\AbstractModel;
use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Model\ResourceModel\Dealer as ResourceModel;

/**
 * Class Dealer
 *
 * @package Yireo\ExampleDealers\Model
 */
class Dealer extends AbstractModel implements DealerInterface
{
    /**
     * Magento constructor
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->getData('name');
    }

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->setData('name', $name);
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getAddress(): string
    {
        return (string)$this->getData('address');
    }

    /**
     * Set the name
     *
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->setData('address', $address);
    }
}
