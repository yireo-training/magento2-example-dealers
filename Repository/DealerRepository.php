<?php

declare(strict_types=1);

namespace Yireo\ExampleDealers\Repository;

use Exception;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;

use Magento\Framework\Filter\TranslitUrl;
use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Api\Data\DealerSearchResultsInterface;
use Yireo\ExampleDealers\Api\Data\DealerSearchResultsInterfaceFactory;
use Yireo\ExampleDealers\Api\DealerRepositoryInterface;
use Yireo\ExampleDealers\Api\DealerSearchCriteriaBuilderInterface;

use Yireo\ExampleDealers\Filter\Name;
use Yireo\ExampleDealers\Model\ResourceModel\Dealer as ResourceModel;
use Yireo\ExampleDealers\Model\ResourceModel\Dealer\CollectionFactory;
use Yireo\ExampleDealers\Model\Dealer as Model;
use Yireo\ExampleDealers\Model\DealerFactory as ModelFactory;

/**
 * Class DealerRepository
 * @package Yireo\ExampleDealers\Model
 */
class DealerRepository implements DealerRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    private $resourceModel;

    /**
     * @var DealerFactory
     */
    private $modelFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var DealerSearchCriteriaBuilderFactory
     */
    private $dealerSearchCriteriaBuilderFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var DealerSearchResultsInterfaceFactory
     */
    private $dealerSearchResultsFactory;
    /**
     * @var Name
     */
    private $filterName;
    /**
     * @var TranslitUrl
     */
    private $translitUrlFilter;

    /**
     * DealerRepository constructor.
     * @param ResourceModel $resourceModel
     * @param ModelFactory $modelFactory
     * @param CollectionFactory $collectionFactory
     * @param DealerSearchCriteriaBuilderFactory $dealerSearchCriteriaBuilderFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param DealerSearchResultsInterfaceFactory $dealerSearchResultsFactory
     * @param Name $filterName
     * @param TranslitUrl $translitUrlFilter
     */
    public function __construct(
        ResourceModel $resourceModel,
        ModelFactory $modelFactory,
        CollectionFactory $collectionFactory,
        DealerSearchCriteriaBuilderFactory $dealerSearchCriteriaBuilderFactory,
        CollectionProcessorInterface $collectionProcessor,
        DealerSearchResultsInterfaceFactory $dealerSearchResultsFactory,
        Name $filterName,
        TranslitUrl $translitUrlFilter
    ) {
        $this->resourceModel = $resourceModel;
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->dealerSearchCriteriaBuilderFactory = $dealerSearchCriteriaBuilderFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->dealerSearchResultsFactory = $dealerSearchResultsFactory;
        $this->filterName = $filterName;
        $this->translitUrlFilter = $translitUrlFilter;
    }

    /**
     * Load a dealer model by ID
     *
     * @param int $id
     * @return DealerInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): DealerInterface
    {
        /** @var Model $model */
        $model = $this->modelFactory->create();
        $this->resourceModel->load($model, $id, 'id');

        if (!$model->getId()) {
            throw new NoSuchEntityException(__('The dealer with ID "%1" does not exist.', $id));
        }

        return $model;
    }

    /**
     * Get an empty dealer model
     *
     * @return DealerInterface
     */
    public function getEmpty(): DealerInterface
    {
        $model = $this->modelFactory->create();
        return $model;
    }

    /**
     * Get a list of dealers
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return DealerSearchResultsInterface
     */
    public function getSearchResults(SearchCriteriaInterface $searchCriteria): DealerSearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var DealerSearchResultsInterface[] $searchResults */
        $searchResults = $this->dealerSearchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @return DealerInterface[]
     */
    public function getAll(): array
    {
        $searchCriteriaBuilder = $this->getSearchCriteriaBuilder();
        $searchCriteria = $searchCriteriaBuilder->create();
        $searchResult = $this->getSearchResults($searchCriteria);
        return $searchResult->getItems();
    }

    /**
     * @return DealerInterface[]
     */
    public function getItems(SearchCriteriaInterface $searchCriteria): array
    {
        $searchResult = $this->getSearchResults($searchCriteria);
        return $searchResult->getItems();
    }

    /**
     * Save a dealer to the database
     *
     * @param DealerInterface $dealer
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(DealerInterface $dealer): void
    {
        $dealer->setName($this->filterName->filter($dealer->getName()));
        if (!$dealer->getUrlKey()) {
            $dealer->setUrlKey($this->translitUrlFilter->filter($dealer->getName()));
        }

        $this->resourceModel->save($dealer);
    }

    /**
     * Delete a dealer from the datase
     *
     * @param DealerInterface $dealer
     * @return void
     * @throws Exception
     */
    public function delete(DealerInterface $dealer): void
    {
        $this->resourceModel->delete($dealer);
    }

    /**
     * @return DealerSearchCriteriaBuilderInterface
     */
    public function getSearchCriteriaBuilder(): DealerSearchCriteriaBuilderInterface
    {
        return $this->dealerSearchCriteriaBuilderFactory->create();
    }
}
