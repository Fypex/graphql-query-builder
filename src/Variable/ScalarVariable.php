<?php
declare(strict_types=1);

namespace Fypex\GraphqlQueryBuilder\Variable;

class ScalarVariable implements VariableInterface
{
    /**
     * @var string
     */
    private $varName;

    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $required;

    /**
     * ScalarVariable constructor.
     *
     * @param string $varName
     * @param string $type
     * @param bool   $required
     */
    public function __construct(string $varName, string $type, bool $required = false)
    {
        $this->varName = $varName;
        $this->type = $type;
        $this->required = $required;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $string = $this->varName . ':' . $this->type;

        if ($this->required) {
            $string .= '!';
        }

        return $string;
    }
}
