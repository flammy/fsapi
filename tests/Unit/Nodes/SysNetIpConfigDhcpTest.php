<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetIpConfigDhcp;

class SysNetIpConfigDhcpTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetIpConfigDhcp();
        parent::__construct();
    }
}