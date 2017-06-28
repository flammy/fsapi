<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetIpConfigDnsSecondary;

class SysNetIpConfigDnsSecondaryTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetIpConfigDnsSecondary();
        parent::__construct();
    }
}