<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\MultiroomGroupRemoveClient;

class MultiroomGroupRemoveClientTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomGroupRemoveClient();
        parent::__construct();
    }
}