<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayServiceIdsFmRdsPi;

class PlayServiceIdsFmRdsPiTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayServiceIdsFmRdsPi();
        parent::__construct();
    }
}