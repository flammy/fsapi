<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysState;

class SysStateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysState;
        parent::__construct();
    }
}