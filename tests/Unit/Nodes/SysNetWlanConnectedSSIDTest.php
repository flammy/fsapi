<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanConnectedSSID;

class SysNetWlanConnectedSSIDTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanConnectedSSID();
        parent::__construct();
    }
}