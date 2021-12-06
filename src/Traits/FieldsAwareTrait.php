<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Traits;

use Fypex\GraphqlQueryBuilder\SelectionSet\Field;

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
