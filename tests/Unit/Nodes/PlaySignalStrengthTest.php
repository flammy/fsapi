<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlaySignalStrength;

class PlaySignalStrengthTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlaySignalStrength();
        parent::__construct();
    }
}