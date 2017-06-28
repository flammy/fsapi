<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayServiceIdsEcc;

class PlayServiceIdsEccTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayServiceIdsEcc();
        parent::__construct();
    }
}