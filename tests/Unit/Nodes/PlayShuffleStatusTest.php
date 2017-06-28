<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayShuffleStatus;

class PlayShuffleStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayShuffleStatus();
        parent::__construct();
    }
}