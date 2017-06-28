<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysClockMode;

class SysClockModeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysClockMode();
        parent::__construct();
    }
}