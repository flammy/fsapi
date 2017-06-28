<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayServiceIdsDabServiceId;

class PlayServiceIdsDabServiceIdTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayServiceIdsDabServiceId();
        parent::__construct();
    }
}