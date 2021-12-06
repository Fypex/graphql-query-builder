<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder;

interface StringableInterface
{
    /**
     * Builds query and returns as a string.
     *
     * @return string
     */
    public function __toString(): string;
}
