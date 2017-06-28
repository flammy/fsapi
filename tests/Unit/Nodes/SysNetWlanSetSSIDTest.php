<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysNetWlanSetSSID;

class SysNetWlanSetSSIDTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetSSID;
        parent::__construct();
    }
}