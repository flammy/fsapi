<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlatformSoftApUpdateUpdateModeStatus;

class PlatformSoftApUpdateUpdateModeStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlatformSoftApUpdateUpdateModeStatus();
        parent::__construct();
    }
}