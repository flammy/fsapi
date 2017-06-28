<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIsuState;

class SysIsuStateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIsuState();
        parent::__construct();
    }
}