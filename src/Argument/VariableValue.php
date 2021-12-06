<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Argument;

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
