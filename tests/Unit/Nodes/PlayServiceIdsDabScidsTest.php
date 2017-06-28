<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayServiceIdsDabScids;

class PlayServiceIdsDabScidsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayServiceIdsDabScids();
        parent::__construct();
    }
}