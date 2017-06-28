<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\MultiroomCapsMaxClients;

class MultiroomCapsMaxClientsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new MultiroomCapsMaxClients;
        parent::__construct();
    }
}