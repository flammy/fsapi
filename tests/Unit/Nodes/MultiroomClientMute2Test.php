<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomClientMute2;

class MultiroomClientMute2Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomClientMute2;
        parent::__construct();
    }
}