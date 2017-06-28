<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavStatus;

class NavStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavStatus();
        parent::__construct();

    }
}