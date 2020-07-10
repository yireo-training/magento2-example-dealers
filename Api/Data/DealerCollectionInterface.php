<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Api\Data;

interface DealerCollectionInterface
{
    /**
     * @return DealerInterface[]
     */
    public function getItems();

    /**
     * @return DealerInterface
     */
    public function getNewEmptyItem();

    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model);
}
