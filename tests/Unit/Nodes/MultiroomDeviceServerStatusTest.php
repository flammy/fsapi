<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomDeviceServerStatus;

class MultiroomDeviceServerStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceServerStatus();
        parent::__construct();
    }
}