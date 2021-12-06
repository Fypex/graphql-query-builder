<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Test\Unit;

use Fypex\GraphqlQueryBuilder\Argument\ListValue;
use Fypex\GraphqlQueryBuilder\Argument\ObjectValue;
use Fypex\GraphqlQueryBuilder\Argument\StringValue;
use Fypex\GraphqlQueryBuilder\Mutation;
use Fypex\GraphqlQueryBuilder\SelectionSet\Field;
use Fypex\GraphqlQueryBuilder\SelectionSet\SelectionSet;
use PHPUnit\Framework\TestCase;

class MutationTest extends TestCase
{
    public function testMutation()
    {
        $accountObject = new ObjectValue();
        $accountObject
            ->add('data', new ListValue([new StringValue('some')]))
            ->add('tags', new ListValue([(new ObjectValue())->add('name', new StringValue('cash'))]));

        $accountsListArg = new ListValue();
        $accountsListArg->add($accountObject);

        $selectionSet = new SelectionSet();
        $selectionSet
            ->add(new Field('id'))
            ->add(new Field('tags', (new SelectionSet())->add(new Field('name'))));

        $mutation = new Mutation();
        $mutation->addField(new Field('createAccounts', $selectionSet, ['accounts' => $accountsListArg]));

        $extectedMutation = <<<'JSON'
mutation {
  createAccounts(accounts:[{data:["some"], tags:[{name:"cash"}]}]) {
    id,
    tags {
      name
    }
  }
}
JSON;

        $extectedMutation = trim(preg_replace('/\s\s+/', ' ', $extectedMutation));
        $extectedMutation = trim(preg_replace('/\s/', ' ', $extectedMutation));

        $this->assertEquals($extectedMutation, $mutation->toString());
    }
}
