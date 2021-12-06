<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Argument;

class ListValue implements ArgumentInterface
{
    /**
     * @var ArgumentInterface[]
     */
    private $list = [];

    /**
     * ListValue constructor.
     *
     * @param ArgumentInterface[]|iterable $list
     */
    public function __construct(iterable $list = [])
    {
        $this->list = array_values($list);
    }

    /**
     * @param ArgumentInterface $argument
     *
     * @return ListValue
     */
    public function add(ArgumentInterface $argument): ListValue
    {
        $this->list[] = $argument;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $out = '[';

        foreach ($this->list as $arg) {
            $out .= (string)$arg . ', ';
        }

        $out = rtrim($out, ', ');
        $out .= ']';

        return $out;
    }
}
