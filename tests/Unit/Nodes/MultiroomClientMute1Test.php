<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomClientMute1;

class MultiroomClientMute1Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomClientMute1;
        parent::__construct();
    }
}