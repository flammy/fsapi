<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavNumItems;

class NavNumItemsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavNumItems();
        parent::__construct();
    }
}