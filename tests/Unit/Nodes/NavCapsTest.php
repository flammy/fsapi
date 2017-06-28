<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavCaps;

class NavCapsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavCaps();
        parent::__construct();
    }
}