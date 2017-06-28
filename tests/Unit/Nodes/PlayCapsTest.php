<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayCaps;

class PlayCapsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayCaps();
        parent::__construct();
    }
}