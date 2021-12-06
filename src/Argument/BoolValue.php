<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Argument;

class BoolValue implements ArgumentInterface
{
    /**
     * @var bool
     */
    private $value;

    /**
     * BoolValue constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->value === true ? 'true' : 'false';
    }
}
