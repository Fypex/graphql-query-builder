<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Traits;

use Fypex\GraphqlQueryBuilder\Variable\VariableInterface;

trait VariablesAwareTrait
{
    /**
     * @var VariableInterface[]
     */
    protected $variables = [];

    /**
     * @param VariableInterface $variable
     *
     * @return $this
     */
    public function addVariable(VariableInterface $variable)
    {
        $this->variables[] = $variable;

        return $this;
    }
}
