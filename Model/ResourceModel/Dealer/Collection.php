<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Model\ResourceModel\Dealer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

use Yireo\ExampleDealers\Model\Dealer as DealerModel;
use Yireo\ExampleDealers\Model\ResourceModel\Dealer as DealerResourceModel;

/**
 * Class Collection
 *
 * @package Yireo\ExampleDealers\Model\ResourceModel\Dealer
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Magento constructor
     */
    protected function _construct()
    {
        $this->_init(
            DealerModel::class,
            DealerResourceModel::class
        );
    }
}
