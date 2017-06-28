<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomCapsProtocolVersion;

class MultiroomCapsProtocolVersionTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomCapsProtocolVersion;
        parent::__construct();
    }
}