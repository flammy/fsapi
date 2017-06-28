<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetIpConfigSubnetMask;

class SysNetIpConfigSubnetMaskTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetIpConfigSubnetMask();
        parent::__construct();
    }
}