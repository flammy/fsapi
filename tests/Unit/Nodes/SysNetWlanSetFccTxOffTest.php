<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanSetFccTxOff;

class SysNetWlanSetFccTxOffTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetFccTxOff();
        parent::__construct();
    }
}