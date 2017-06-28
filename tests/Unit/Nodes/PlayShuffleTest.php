<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayShuffle;

class PlayShuffleTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayShuffle();
        parent::__construct();
    }
}