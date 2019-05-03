<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Dealer
 * @package Yireo\ExampleDealers\Model\ResourceModel
 */
class Dealer extends AbstractDb
{
    /**
     * Magento constructor
     */
    protected function _construct()
    {
        $this->_init('example_dealers', 'id');
    }
}
