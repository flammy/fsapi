<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomDeviceClientStatus;

class MultiroomDeviceClientStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceClientStatus;
        parent::__construct();
    }
}