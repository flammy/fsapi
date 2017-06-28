<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MiscFsDebugComponent;

class MiscFsDebugComponentTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MiscFsDebugComponent;
        parent::__construct();
    }
}