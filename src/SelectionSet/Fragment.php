<?php

namespace Fypex\GraphqlQueryBuilder\SelectionSet;

use Fypex\GraphqlQueryBuilder\Argument\ArgumentInterface;
use Fypex\GraphqlQueryBuilder\StringableInterface;


/**
 * Class Fragment represents fragment from fragment set.
 */
class Fragment implements StringableInterface
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
     * @var string
     */
    private $type;

    /**
     * Field constructor.
     *
     * @param string $name Fragment name.
     * @param string $name Fragment type.
     * @param SelectionSet $selectionSet Selection set for nested field.
     */
    public function __construct(string $name, string $type, SelectionSet $selectionSet = null)
    {
        $this->name = $name;
        $this->type = $type;
        $selectionSet !== null && $this->setSelectionSet($selectionSet);
    }

    public function getName(): string
    {
        return '...'.$this->name;
    }

    public function getSelection(): SelectionSet
    {
        return new SelectionSet([new Field($this->getName())]);
    }

    /**
     * @param SelectionSet $selectionSet
     *
     * @return Field
     */
    public function setSelectionSet(SelectionSet $selectionSet): Fragment
    {
        $this->selectionSet = $selectionSet;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {

        $fragment = 'fragment';
        $name = (string)$this->name;
        $type = (string)$this->type;
        $fragment .= ' '. $name;
        $fragment .= ' on '. $type;
        $fragment .= ' ' . (string)$this->selectionSet.' ';

        return $fragment;
    }

}
