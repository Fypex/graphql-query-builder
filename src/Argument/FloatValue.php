<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Argument;

class FloatValue implements ArgumentInterface
{
    /**
     * @var float
     */
    private $value;

    /**
     * FloatValue constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }
}
