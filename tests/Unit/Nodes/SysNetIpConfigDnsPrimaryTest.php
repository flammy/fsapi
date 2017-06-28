<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetIpConfigDnsPrimary;

class SysNetIpConfigDnsPrimaryTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetIpConfigDnsPrimary();
        parent::__construct();
    }
}