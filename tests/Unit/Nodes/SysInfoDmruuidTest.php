<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysInfoDmruuid;

class SysInfoDmruuidTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysInfoDmruuid();
        parent::__construct();
    }
}