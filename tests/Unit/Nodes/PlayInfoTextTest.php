<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayInfoText;

class PlayInfoTextTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayInfoText();
        parent::__construct();
    }
}