<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanScanList;

class SysNetWlanScanListTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanScanList();
        parent::__construct();
    }
}