<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\TestIperfCommandLine;

class TestIperfCommandLineTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new TestIperfCommandLine;
        parent::__construct();
    }
}