<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Argument;

class StringValue implements ArgumentInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * StringValue constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return '"' . $this->value . '"';
    }
}
