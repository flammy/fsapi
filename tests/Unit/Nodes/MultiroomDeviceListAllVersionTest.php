<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomDeviceListAllVersion;

class MultiroomDeviceListAllVersionTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceListAllVersion;
        parent::__construct();
    }
}