<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Helper;

use Helis\GraphqlQueryBuilder\SelectionSet\Field;
use Helis\GraphqlQueryBuilder\SelectionSet\SelectionSet;

class PageInfoSelectionSetFactory
{
    public static function getName(): string
    {
        return 'pageInfo';
    }

    public static function getSelectionSet(): SelectionSet
    {
        return new SelectionSet([
            new Field('hasNextPage'),
            new Field('hasPreviousPage'),
            new Field('startCursor'),
            new Field('endCursor'),
        ]);
    }

    public static function getAsField(): Field
    {
        return new Field(self::getName(), self::getSelectionSet());
    }
}
