<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Integration;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Module\ModuleList;

use Magento\TestFramework\Helper\Bootstrap;

use Magento\TestFramework\ObjectManager;
use PHPUnit\Framework\TestCase;
use Yireo\ExampleDealers\Api\Data\DealerInterface;
use Yireo\ExampleDealers\Api\DealerRepositoryInterface;
use Yireo\ExampleDealers\Model\DealerRepository;

/**
 * Class ModuleTest
 * @package Yireo\ExampleDealers\Test\Functional
 */
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
        $this->assertEmpty($items);

        $this->createDealer('John Doe', 'Testing Street 1');
        $this->createDealer('Jane Doe', 'Testing Street 2');
        $dealers = $this->repository->getAll();
        $this->assertCount(2, $dealers);
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
        $this->assertEmpty($items);

        $dealer = $this->createDealer('Kermit', 'Frog Street 1');
        $dealers = $this->repository->getAll();
        $this->assertCount(1, $dealers);

        $this->assertNotEmpty($dealer->getId());
        $this->assertTrue($dealer->getId() > 0);
        $newDealer = $this->repository->getById((int)$dealer->getId());
        $this->assertSame($dealer->getId(), $newDealer->getId());

        $this->assertSame('Kermit', $newDealer->getName());
        $this->assertSame('Frog Street 1', $newDealer->getAddress());

        $newDealer->setName('Kormot');
        $newDealer->setAddress('Sesame Street 42');
        $this->repository->save($newDealer);

        $newestDealer = $this->repository->getById((int)$dealer->getId());
        $this->assertSame('Kormot', $newestDealer->getName());
        $this->assertSame('Sesame Street 42', $newestDealer->getAddress());

        $this->repository->delete($newestDealer);
        $items = $this->repository->getAll();
        $this->assertEmpty($items);
    }

    /**
     * Test if the repository returns multiple items
     *
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     */
    public function testIfRepositoryReturnsZeroItems()
    {
        $this->assertInstanceOf(DealerRepository::class, $this->repository);
        $items = $this->repository->getAll();
        $this->assertEmpty($items);
    }

    /**
     * @param string $name
     * @param string $address
     * @return DealerInterface
     */
    private function createDealer(string $name, string $address): DealerInterface
    {
        $dealer = $this->repository->getEmpty();
        $dealer->setName($name);
        $dealer->setAddress($address);
        $this->repository->save($dealer);
        return $dealer;
    }
}
