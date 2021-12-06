<?php
declare(strict_types=1);

namespace Helis\GraphqlQueryBuilder\Traits;

use Helis\GraphqlQueryBuilder\SelectionSet\Fragment;

trait FragmentsAwareTrait
{
    /**
     * @var Fragment[]
     */
    protected $fragments = [];

    /**
     * Adds new fragment.
     *
     * @param Fragment $fragment
     *
     * @return $this
     */
    public function addFragment(Fragment $fragment)
    {
        $this->fragments[] = $fragment;

        return $this;
    }
}
