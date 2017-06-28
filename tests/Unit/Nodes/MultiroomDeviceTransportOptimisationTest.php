<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomDeviceTransportOptimisation;

class MultiroomDeviceTransportOptimisationTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceTransportOptimisation();
        parent::__construct();
    }
}