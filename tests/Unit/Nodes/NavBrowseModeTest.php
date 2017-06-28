<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavBrowseMode;

class NavBrowseModeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavBrowseMode();
        parent::__construct();
    }
}