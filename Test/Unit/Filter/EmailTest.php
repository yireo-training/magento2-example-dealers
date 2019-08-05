<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Unit\Filter;

use Magento\Framework\Exception\InputException;
use Magento\Framework\Validator\EmailAddress;
use PHPUnit\Framework\TestCase;
use Yireo\ExampleDealers\Filter\Email;

class EmailTest extends TestCase
{
    private function getFilterEmailObject(bool $isValid = true)
    {
        $stub = $this->getMockBuilder(EmailAddress::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $stub->method('isValid')
            ->willReturn($isValid);

        return new Email($stub);
    }

    /**
     * @dataProvider getData()
     * @param string $expectedReturn
     * @param string $actualReturn
     * @throws InputException
     */
    public function testIfFilterWorks(string $expectedReturn, string $actualReturn, bool $expectation)
    {
        $filterEmail = $this->getFilterEmailObject();
        $this->assertEquals(($expectedReturn === $filterEmail->filter($actualReturn)), $expectation);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            ['jisse@yireo.com', 'jisse@yireo.com', true],
            ['jisse@yireo.com', 'jisse@yireo.com ', true],
            ['jisse@yireo.com2', 'jisse@yireo.com', false],
        ];
    }

    /**
     * @dataProvider getInvalidData()
     * @param string $expectedReturn
     * @param string $actualReturn
     * @throws InputException
     */
    public function testIfExceptionWorks(string $input)
    {
        $this->expectException(InputException::class);
        $filterEmail = $this->getFilterEmailObject(false);
        $filterEmail->filter($input);
    }

    /**
     * @return array
     */
    public function getInvalidData(): array
    {
        return [
            ['jisse@yireo.']
        ];
    }
}