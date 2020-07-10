<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DealerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get dealers list.
     *
     * @return DealerInterface[]
     */
    public function getItems();

    /**
     * Set dealers list.
     *
     * @param DealerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
