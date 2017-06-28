<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAlarmDuration;

class SysAlarmDurationTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAlarmDuration();
        parent::__construct();
    }
}