<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAlarmConfig;

class SysAlarmConfigTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAlarmConfig();
        parent::__construct();
    }
}