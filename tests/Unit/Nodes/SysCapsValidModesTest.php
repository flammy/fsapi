<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsValidModes;

class SysCapsValidModesTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsValidModes();
        parent::__construct();
    }
}