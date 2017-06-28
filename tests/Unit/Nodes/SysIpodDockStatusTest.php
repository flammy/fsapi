<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIpodDockStatus;

class SysIpodDockStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIpodDockStatus();
        parent::__construct();
    }
}