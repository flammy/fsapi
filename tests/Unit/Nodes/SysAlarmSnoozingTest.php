<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAlarmSnoozing;

class SysAlarmSnoozingTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAlarmSnoozing();
        parent::__construct();
    }
}