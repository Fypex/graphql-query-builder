<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Traits;

trait TypeAwareTrait
{
    protected $type;

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
}
