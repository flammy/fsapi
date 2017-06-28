<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayRepeat;

class PlayRepeatTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayRepeat();
        parent::__construct();
    }
}