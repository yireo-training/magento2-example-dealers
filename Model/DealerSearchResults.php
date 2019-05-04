<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Model;

use Magento\Framework\Api\SearchResults;
use Yireo\ExampleDealers\Api\Data\DealerSearchResultsInterface;

/**
 * Class DealerSearchResults
 *
 * @package Yireo\ExampleDealers\Model
 */
class DealerSearchResults extends SearchResults implements DealerSearchResultsInterface
{
}
