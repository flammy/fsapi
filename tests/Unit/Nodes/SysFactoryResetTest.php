<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysFactoryReset;

class SysFactoryResetTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysFactoryReset();
        parent::__construct();
    }
}