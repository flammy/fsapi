<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayControl;

class PlayControlTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayControl();
        parent::__construct();
    }
}