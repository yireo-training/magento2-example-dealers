<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Repository;

use Magento\Framework\Api\SearchResults;
use Yireo\ExampleDealers\Api\Data\DealerSearchResultsInterface;

/**
 * Class DealerSearchResults
 *
 * @package Yireo\ExampleDealers\Repository
 */
class DealerSearchResults extends SearchResults implements DealerSearchResultsInterface
{
}
