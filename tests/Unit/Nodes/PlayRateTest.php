<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayRate;

class PlayRateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayRate();
        parent::__construct();
    }
}