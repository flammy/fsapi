<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayErrorStr;

class PlayErrorStrTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayErrorStr();
        parent::__construct();
    }
}