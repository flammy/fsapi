<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomDeviceClientIndex;

class MultiroomDeviceClientIndexTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceClientIndex;
        parent::__construct();
    }
}