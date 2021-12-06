<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder;

use Fypex\GraphqlQueryBuilder\Traits\FieldsAwareTrait;
use Fypex\GraphqlQueryBuilder\Traits\OperationNameAwareTrait;
use Fypex\GraphqlQueryBuilder\Traits\ToStringTrait;
use Fypex\GraphqlQueryBuilder\Traits\VariablesAwareTrait;

class Mutation implements StringableInterface
{
    use ToStringTrait, FieldsAwareTrait, VariablesAwareTrait, OperationNameAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $query = 'mutation';

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
