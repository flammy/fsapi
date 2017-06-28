<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomGroupCreate;

class MultiroomGroupCreateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomGroupCreate();
        parent::__construct();
    }
}