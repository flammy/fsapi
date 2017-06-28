<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomDeviceListAll;

class MultiroomDeviceListAllTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomDeviceListAll;
        parent::__construct();
    }
}