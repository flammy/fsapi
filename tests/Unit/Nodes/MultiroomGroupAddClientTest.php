<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomGroupAddClient;

class MultiroomGroupAddClientTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomGroupAddClient();
        parent::__construct();
    }
}