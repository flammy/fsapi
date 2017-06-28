<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavState;

class NavStateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavState();
        parent::__construct();
    }
}