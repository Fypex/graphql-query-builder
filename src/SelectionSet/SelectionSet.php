<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\SelectionSet;

use Fypex\GraphqlQueryBuilder\StringableInterface;

/**
 * Class SelectionSet represents set of fields
 */
class SelectionSet implements StringableInterface
{
    /**
     * @var Field[]
     */
    private $fields = [];

    /**
     * SelectionSet constructor.
     *
     * @param Field[]|iterable $fields
     */
    public function __construct(iterable $fields = [])
    {
        foreach ($fields as $field) {
            $this->add($field);
        }
    }

    /**
     * Adds new field to selection set
     *
     * @param Field $field
     *
     * @return SelectionSet
     */
    public function add(Field $field): SelectionSet
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        if (empty($this->fields)) {
            return '';
        }

        $out = '{ ';

        foreach ($this->fields as $field) {
            $out .= (string)$field . ', ';
        }

        $out = rtrim($out, ', ');
        $out .= ' }';

        return $out;
    }
}
