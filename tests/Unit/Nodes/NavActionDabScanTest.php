<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavActionDabScan;

class NavActionDabScanTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavActionDabScan();
        parent::__construct();
    }
}