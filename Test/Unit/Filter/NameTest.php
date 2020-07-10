<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Unit\Filter;

use PHPUnit\Framework\TestCase;
use Yireo\ExampleDealers\Filter\Name;

class NameTest extends TestCase
{
    /**
     * @var Name
     */
    private $filterName;

    protected function setUp()
    {
        $this->filterName = new Name();
    }

    /**
     * @dataProvider getData()
     * @param string $expectedReturn
     * @param string $actualReturn
     */
    public function testIfFilterWorks(string $expectedReturn, string $actualReturn, bool $expectation)
    {
        $this->assertEquals(($expectedReturn === $this->filterName->filter($actualReturn)), $expectation);
    }

    public function getData(): array
    {
        return [
            ['foobar', 'foobar', true],
            ['foobar', 'foobar ', true],
            ['foobar', ' foobar ', true],
            ['foobar', 'foobar2', false],
        ];
    }
}
