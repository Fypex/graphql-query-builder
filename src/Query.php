<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder;

use Helis\GraphqlQueryBuilder\Traits\FieldsAwareTrait;
use Helis\GraphqlQueryBuilder\Traits\OperationNameAwareTrait;
use Helis\GraphqlQueryBuilder\Traits\ToStringTrait;
use Helis\GraphqlQueryBuilder\Traits\VariablesAwareTrait;

class Query implements StringableInterface
{
    use ToStringTrait, FieldsAwareTrait, VariablesAwareTrait, OperationNameAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $query = 'query';

        if (is_string($this->operationName)) {
            $query .= ' ' . $this->operationName . ' ';
        }

        if (count($this->variables) > 0) {
            $query .= '(';
            foreach ($this->variables as $variable) {
                $query .= (string)$variable . ', ';
            }
            $query = rtrim($query, ', ');
            $query .= ')';
        }

        $query .= ' { ';
        foreach ($this->fields as $operation) {
            $query .= (string)$operation . ', ';
        }

        $query = rtrim($query, ', ');
        $query .= ' }';

        return $query;
    }
}
