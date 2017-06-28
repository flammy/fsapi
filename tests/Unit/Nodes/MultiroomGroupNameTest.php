<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomGroupName;

class MultiroomGroupNameTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomGroupName();
        parent::__construct();
    }
}