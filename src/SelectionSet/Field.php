<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\SelectionSet;

use Helis\GraphqlQueryBuilder\Argument\ArgumentInterface;
use Helis\GraphqlQueryBuilder\StringableInterface;

/**
 * Class Field represents field from field set.
 */
class Field implements StringableInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var SelectionSet
     */
    private $selectionSet;

    /**
     * @var ArgumentInterface[]
     */
    private $selectionSetArgs;

    /**
     * Field constructor.
     *
     * @param string                       $name Field name.
     * @param SelectionSet                 $selectionSet Selection set for nested field.
     * @param ArgumentInterface[]|iterable $selectionSetArgs Map of arguments for selection set.
     */
    public function __construct(string $name, SelectionSet $selectionSet = null, iterable $selectionSetArgs = [])
    {
        $this->name = $name;
        $selectionSet !== null && $this->setSelectionSet($selectionSet);

        foreach ($selectionSetArgs as $name => $argument) {
            $this->addArgument($name, $argument);
        }
    }

    /**
     * @param SelectionSet $selectionSet
     *
     * @return Field
     */
    public function setSelectionSet(SelectionSet $selectionSet): Field
    {
        $this->selectionSet = $selectionSet;

        return $this;
    }

    /**
     * @param string            $name
     * @param ArgumentInterface $argument
     *
     * @return Field
     */
    public function addArgument(string $name, ArgumentInterface $argument): Field
    {
        $this->selectionSetArgs[$name] = $argument;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $out = (string)$this->name;

        if ($this->selectionSet) {
            if ($this->selectionSetArgs) {
                $out .= '(';
                foreach ($this->selectionSetArgs as $name => $arg) {
                    $out .= $name . ':' . (string)$arg . ', ';
                }
                $out = rtrim($out, ', ');
                $out .= ')';
            }

            $out .= ' ' . (string)$this->selectionSet;
        }

        return $out;
    }
}
