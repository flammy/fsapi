<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavDepth;

class NavDepthTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavDepth();
        parent::__construct();
    }
}