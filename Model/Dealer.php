<?php declare(strict_types=1);

namespace Yireo\ExampleDealers\Model;

use Magento\Framework\Model\AbstractModel;
use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Model\ResourceModel\Dealer as ResourceModel;

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
    public function getUrlKey(): string
    {
        return (string)$this->getData('url_key');
    }

    /**
     * Set the name
     *
     * @param string $urlKey
     */
    public function setUrlKey(string $urlKey)
    {
        $this->setData('url_key', $urlKey);
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

    /**
     * Get the name
     *
     * @return string
     */
    public function getDescription(): string
    {
        return (string)$this->getData('description');
    }

    /**
     * Set the name
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->setData('description', $description);
    }
}
