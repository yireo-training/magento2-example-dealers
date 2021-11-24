<?php declare(strict_types=1);

namespace Yireo\ExampleDealers\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

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
