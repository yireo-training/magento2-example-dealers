<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Test\Unit\Filter;

use Magento\Framework\Exception\InputException;
use Magento\Framework\Validator\EmailAddress;
use PHPUnit\Framework\TestCase;
use Yireo\ExampleDealers\Filter\Email;

class EmailIntegrationTest extends TestCase
{
    private function getFilterEmailObject()
    {
        $emailAddress = new EmailAddress();
        return new Email($emailAddress);
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
        $filterEmail = $this->getFilterEmailObject();
        $filterEmail->filter($input);
    }

    /**
     * @return array
     */
    public function getInvalidData(): array
    {
        return [
            ['jisse@yireo.kitchen']
        ];
    }
}