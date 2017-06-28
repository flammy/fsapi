<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysClockUtcOffset;

class SysClockUtcOffsetTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysClockUtcOffset();
        parent::__construct();
    }
}