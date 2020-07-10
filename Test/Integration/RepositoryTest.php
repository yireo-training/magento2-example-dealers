<?php

declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Integration;

use Magento\TestFramework\Helper\Bootstrap;

use Magento\TestFramework\ObjectManager;
use PHPUnit\Framework\TestCase;

use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Api\DealerRepositoryInterface;
use Yireo\ExampleDealers\Repository\DealerRepository;

class RepositoryTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var DealerRepositoryInterface
     */
    private $repository;

    /**
     * Setup
     */
    protected function setUp()
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->repository = $this->objectManager->get(DealerRepositoryInterface::class);
    }

    /**
     * Test if the repository returns multiple items
     *
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testIfRepositoryReturnsMultipleItems()
    {
        $this->assertInstanceOf(DealerRepository::class, $this->repository);
        $items = $this->repository->getAll();
        $originalCount = count($items);

        $this->createDealer('Jane Doe', 'Testing Street 2', 'My name is Jane');
        $this->createDealer('John Doe', 'Testing Street 1', 'My name is John');

        $dealers = $this->repository->getAll();
        $this->assertCount($originalCount + 2, $dealers);
    }

    /**
     * Test if the repository loads, saves and deletes properly
     *
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testIfRepositoryLoadsAndSavesAndDeletes()
    {
        $this->assertInstanceOf(DealerRepository::class, $this->repository);
        $items = $this->repository->getAll();
        $originalCount = count($items);

        $dealer = $this->createDealer('Kermit', 'Frog Street 1', 'Green is nice');
        $dealers = $this->repository->getAll();
        $this->assertCount($originalCount + 1, $dealers);

        $this->assertNotEmpty($dealer->getId());
        $this->assertTrue($dealer->getId() > 0);
        $newDealer = $this->repository->getById((int)$dealer->getId());
        $this->assertSame($dealer->getId(), $newDealer->getId());

        $this->assertSame('Kermit', $newDealer->getName());
        $this->assertSame('kermit', $newDealer->getUrlKey());
        $this->assertSame('Frog Street 1', $newDealer->getAddress());
        $this->assertSame('Green is nice', $newDealer->getDescription());

        $newDealer->setName('Kormot');
        $newDealer->setUrlKey('kormot');
        $newDealer->setAddress('Sesame Street 42');
        $this->repository->save($newDealer);

        $newestDealer = $this->repository->getById((int)$dealer->getId());
        $this->assertSame('Kormot', $newestDealer->getName());
        $this->assertSame('kormot', $newestDealer->getUrlKey());
        $this->assertSame('Sesame Street 42', $newestDealer->getAddress());

        $this->repository->delete($newestDealer);
        $items = $this->repository->getAll();
        $this->assertCount($originalCount, $items);
    }

    /**
     * @param string $name
     * @param string $address
     * @param string $description
     * @param string $urlKey
     * @return DealerInterface
     */
    private function createDealer(
        string $name,
        string $address,
        string $description,
        string $urlKey = ''
    ): DealerInterface {
        $dealer = $this->repository->getEmpty();
        $dealer->setName($name);
        $dealer->setAddress($address);
        $dealer->setDescription($description);
        $dealer->setUrlKey($urlKey);
        $this->repository->save($dealer);
        return $dealer;
    }
}
