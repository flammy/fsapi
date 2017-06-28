<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomGroupStreamable;

class MultiroomGroupStreamableTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomGroupStreamable();
        parent::__construct();
    }
}