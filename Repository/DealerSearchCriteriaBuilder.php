<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Repository;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Yireo\ExampleDealers\Api\DealerSearchCriteriaBuilderInterface;

class DealerSearchCriteriaBuilder extends SearchCriteriaBuilder implements DealerSearchCriteriaBuilderInterface
{
}
