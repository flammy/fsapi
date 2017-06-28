<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\TestIperfExecute;

class TestIperfExecuteTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new TestIperfExecute;
        parent::__construct();
    }
}