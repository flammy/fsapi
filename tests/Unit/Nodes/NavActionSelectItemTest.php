<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavActionSelectItem;

class NavActionSelectItemTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavActionSelectItem();
        parent::__construct();
    }
}