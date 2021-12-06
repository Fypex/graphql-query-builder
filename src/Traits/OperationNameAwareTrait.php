<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Traits;

trait OperationNameAwareTrait
{
    protected $operationName;

    /**
     * @param string $operationName
     * @return $this
     */
    public function setOperationName(string $operationName)
    {
        $this->operationName = $operationName;

        return $this;
    }
}
