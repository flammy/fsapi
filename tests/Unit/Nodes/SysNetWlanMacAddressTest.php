<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanMacAddress;

class SysNetWlanMacAddressTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanMacAddress();
        parent::__construct();
    }
}