<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayAddPresetStatus;

class PlayAddPresetStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayAddPresetStatus();
        parent::__construct();
    }
}