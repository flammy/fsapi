<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysClockLocalTime;

class SysClockLocalTimeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysClockLocalTime();
        parent::__construct();
    }
}