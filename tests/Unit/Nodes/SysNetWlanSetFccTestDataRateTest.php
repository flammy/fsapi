<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanSetFccTestDataRate;

class SysNetWlanSetFccTestDataRateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetFccTestDataRate();
        parent::__construct();
    }
}