<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Repository;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Yireo\ExampleDealers\Api\DealerSearchCriteriaBuilderInterface;

/**
 * Class DealerSearchCriteriaBuilder
 * @package Yireo\ExampleDealers\Repository
 */
class DealerSearchCriteriaBuilder extends SearchCriteriaBuilder implements DealerSearchCriteriaBuilderInterface
{
    public function addSortByPrimaryKey()
    {

    }
}
