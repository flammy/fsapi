<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAlarmSnooze;

class SysAlarmSnoozeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAlarmSnooze();
        parent::__construct();
    }
}