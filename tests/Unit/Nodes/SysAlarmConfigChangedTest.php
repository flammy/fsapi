<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAlarmConfigChanged;

class SysAlarmConfigChangedTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAlarmConfigChanged();
        parent::__construct();
    }
}