<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Traits;

trait ToStringTrait
{
    /**
     * Alias method for __toString()
     *
     * @return string
     */
    public function toString(): string
    {
        return (string)$this;
    }
}
