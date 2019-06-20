<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Unit\Model;

use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use PHPUnit\Framework\TestCase;
use Yireo\ExampleDealers\Model\Dealer;

class DealerTest extends TestCase
{
    public function testSomething()
    {
        $context = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $registry = $this->getMockBuilder(Registry::class)
            ->disableOriginalConstructor()
            ->getMock();

        $model = new Dealer($context, $registry);

        $this->assertInstanceOf(Dealer::class, $model);
    }
}