<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Variable;

class StringVariable extends ScalarVariable
{
    /**
     * StringVariable constructor.
     *
     * @param string $varName
     * @param bool   $required
     */
    public function __construct(string $varName, bool $required = false)
    {
        parent::__construct($varName, 'String', $required);
    }
}
