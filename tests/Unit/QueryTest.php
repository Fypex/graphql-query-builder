<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Test;

use Helis\GraphqlQueryBuilder\Argument\IntValue;
use Helis\GraphqlQueryBuilder\Operation;
use Helis\GraphqlQueryBuilder\Query;
use Helis\GraphqlQueryBuilder\SelectionSet\Field;
use Helis\GraphqlQueryBuilder\SelectionSet\SelectionSet;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testQuery()
    {
        $selectionSet = new SelectionSet();
        $selectionSet
            ->add(new Field('id'))
            ->add(new Field('name'))
            ->add(new Field(
                'friends',
                (new SelectionSet())
                    ->add(new Field(
                        'edge',
                        (new SelectionSet())
                            ->add(new Field('cursor'))
                            ->add(new Field(
                                'node',
                                (new SelectionSet())
                                    ->add(new Field('name'))
                            ))
                    )),
                [
                    'last' => new IntValue(3),
                ]
            ));

        $userOperation = new Field('user');
        $userOperation
            ->setSelectionSet($selectionSet)
            ->addArgument('id', new IntValue(12));

        $query = new Query();
        $query->addField($userOperation);

        $extectedQuery = <<<'JSON'
query {
    user(id:12) {
        id,
        name,
        friends(last:3) {
            edge {
                cursor,
                node {
                    name
                }
            }
        }
    }
}
JSON;
        $extectedQuery = trim(preg_replace('/\s\s+/', ' ', $extectedQuery));
        $extectedQuery = trim(preg_replace('/\s/', ' ', $extectedQuery));
        $this->assertEquals($extectedQuery, $query->toString());
    }
}
