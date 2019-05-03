<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Yireo\ExampleDealers\Api\DealerSearchCriteriaBuilderInterface;

/**
 * Class DealerSearchCriteriaBuilder
 * @package Yireo\ExampleDealers\Model
 */
class DealerSearchCriteriaBuilder extends SearchCriteriaBuilder implements DealerSearchCriteriaBuilderInterface
{
}
