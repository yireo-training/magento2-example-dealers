<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Api;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Api\Data\DealerSearchResultsInterface;

interface DealerRepositoryInterface
{
    /**
     * @param int $id
     * @return DealerInterface
     */
    public function getById(int $id): DealerInterface;

    /**
     * @return DealerInterface
     */
    public function getEmpty(): DealerInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return DealerSearchResultsInterface
     */
    public function getSearchResults(SearchCriteriaInterface $searchCriteria): DealerSearchResultsInterface;

    /**
     * @return DealerInterface[]
     */
    public function getAll(): array;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return DealerInterface[]
     */
    public function getItems(SearchCriteriaInterface $searchCriteria): array;

    /**
     * @param DealerInterface $dealer
     * @return void
     */
    public function save(DealerInterface $dealer): void;

    /**
     * @param DealerInterface $dealer
     * @return void
     */
    public function delete(DealerInterface $dealer): void;

    /**
     * @return DealerSearchCriteriaBuilderInterface
     */
    public function getSearchCriteriaBuilder(): DealerSearchCriteriaBuilderInterface;
}
