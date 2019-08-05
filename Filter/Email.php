<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Filter;

use Magento\Framework\Exception\InputException;
use Magento\Framework\Validator\EmailAddress;

class Email
{
    /**
     * @var EmailAddress
     */
    private $emailAddress;

    /**
     * Email constructor.
     * @param EmailAddress $emailAddress
     */
    public function __construct(
        EmailAddress $emailAddress
    ) {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @param string $email
     * @return string
     * @throws InputException
     */
    public function filter(string $email): string
    {
        $email = trim($email);

        if ($this->emailAddress->isValid($email) === false) {
            throw new InputException(__('Blah'));
        }

        return $email;
    }
}
