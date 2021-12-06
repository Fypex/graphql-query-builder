<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Helper;

use Fypex\GraphqlQueryBuilder\SelectionSet\Field;
use Fypex\GraphqlQueryBuilder\SelectionSet\SelectionSet;

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
