<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayPosition;

class PlayPositionTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayPosition();
        parent::__construct();
    }
}