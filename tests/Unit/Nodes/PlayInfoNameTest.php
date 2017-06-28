<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayInfoName;

class PlayInfoNameTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayInfoName();
        parent::__construct();
    }
}