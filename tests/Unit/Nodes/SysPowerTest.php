<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysPower;

class SysPowerTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysPower;
        parent::__construct();
    }
}