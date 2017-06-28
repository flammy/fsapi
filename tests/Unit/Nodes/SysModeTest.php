<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysMode;

class SysModeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysMode();
        parent::__construct();
    }
}