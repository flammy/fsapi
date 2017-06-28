<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavActionDabPrune;

class NavActionDabPruneTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavActionDabPrune();
        parent::__construct();
    }
}