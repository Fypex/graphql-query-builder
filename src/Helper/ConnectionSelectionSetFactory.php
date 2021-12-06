<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Helper;

use Fypex\GraphqlQueryBuilder\SelectionSet\Field;
use Fypex\GraphqlQueryBuilder\SelectionSet\SelectionSet;

class ConnectionSelectionSetFactory
{
    public static function getSelectionSet(SelectionSet $nodeSelectionSet): SelectionSet
    {
        return new SelectionSet([
            PageInfoSelectionSetFactory::getAsField(),
            new Field('edges', new SelectionSet([
                new Field('cursor'),
                new Field('node', $nodeSelectionSet),
            ])),
        ]);
    }
}
