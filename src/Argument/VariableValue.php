<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Argument;

class VariableValue extends StringValue
{
    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return trim(parent::__toString(), "\"\'");
    }
}
