<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayStatus;

class PlayStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayStatus();
        parent::__construct();
    }
}