<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavActionNavigate;

class NavActionNavigateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavActionNavigate();
        parent::__construct();
    }
}