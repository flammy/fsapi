<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MiscFsDebugTraceLevel;

class MiscFsDebugTraceLevelTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MiscFsDebugTraceLevel;
        parent::__construct();
    }
}