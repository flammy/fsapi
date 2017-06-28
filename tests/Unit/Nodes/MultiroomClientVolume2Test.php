<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomClientVolume2;

class MultiroomClientVolume2Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomClientVolume2;
        parent::__construct();
    }
}