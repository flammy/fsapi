<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWiredInterfaceEnable;

class SysNetWiredInterfaceEnableTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWiredInterfaceEnable();
        parent::__construct();
    }
}