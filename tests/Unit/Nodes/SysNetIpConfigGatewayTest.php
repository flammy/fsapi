<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetIpConfigGateway;

class SysNetIpConfigGatewayTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetIpConfigGateway();
        parent::__construct();
    }
}