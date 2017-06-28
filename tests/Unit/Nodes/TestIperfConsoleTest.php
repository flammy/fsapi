<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\TestIperfConsole;

class TestIperfConsoleTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new TestIperfConsole;
        parent::__construct();
    }
}