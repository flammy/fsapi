<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavDabScanUpdate;

class NavDabScanUpdateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavDabScanUpdate();
        parent::__construct();
    }
}