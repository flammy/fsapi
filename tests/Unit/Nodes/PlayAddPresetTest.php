<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayAddPreset;

class PlayAddPresetTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayAddPreset();
        parent::__construct();
    }
}