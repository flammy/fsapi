<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWiredMacAddress;

class SysNetWiredMacAddressTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWiredMacAddress();
        parent::__construct();
    }
}