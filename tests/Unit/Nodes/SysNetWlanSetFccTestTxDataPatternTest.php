<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanSetFccTestTxDataPattern;

class SysNetWlanSetFccTestTxDataPatternTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetFccTestTxDataPattern();
        parent::__construct();
    }
}