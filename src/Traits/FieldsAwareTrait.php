<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Traits;

use Helis\GraphqlQueryBuilder\SelectionSet\Field;

trait FieldsAwareTrait
{
    /**
     * @var Field[]
     */
    protected $fields = [];

    /**
     * Adds new field.
     *
     * @param Field $field
     *
     * @return $this
     */
    public function addField(Field $field)
    {
        $this->fields[] = $field;

        return $this;
    }
}
