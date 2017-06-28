<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanSetFccTestTxPower;

class SysNetWlanSetFccTestTxPowerTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetFccTestTxPower();
        parent::__construct();
    }
}