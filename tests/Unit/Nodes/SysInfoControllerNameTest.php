<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysInfoControllerName;

class SysInfoControllerNameTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysInfoControllerName();
        parent::__construct();
    }
}