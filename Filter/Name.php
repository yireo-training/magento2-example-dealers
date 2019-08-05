<?php
declare(strict_types=1);

namespace Yireo\ExampleDealers\Filter;

class Name
{
    public function filter(string $name): string
    {
        return trim($name);
    }
}
