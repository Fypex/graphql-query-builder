<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Argument;

class ObjectValue implements ArgumentInterface
{
    /**
     * @var ArgumentInterface[]
     */
    private $fields = [];

    /**
     * ObjectValue constructor.
     *
     * @param ArgumentInterface[]|iterable $fields Fields map
     */
    public function __construct(iterable $fields = [])
    {
        foreach ($fields as $name => $argument) {
            $this->add($name, $argument);
        }
    }

    /**
     * Adds field to argument object.
     *
     * @param string            $name
     * @param ArgumentInterface $argument
     *
     * @return ObjectValue
     */
    public function add(string $name, ArgumentInterface $argument): ObjectValue
    {
        $this->fields[$name] = $argument;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $out = '{';

        foreach ($this->fields as $name => $arg) {
            $out .= $name . ':' . (string)$arg . ', ';
        }

        $out = rtrim($out, ', ');
        $out .= '}';

        return $out;
    }
}
