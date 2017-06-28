<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysSleep;

class SysSleepTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysSleep;
        parent::__construct();
    }
}