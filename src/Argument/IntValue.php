<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Argument;

class IntValue implements ArgumentInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * IntValue constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }
}
