<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayFrequency;

class PlayFrequencyTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayFrequency();
        parent::__construct();
    }
}