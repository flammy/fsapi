<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIsuVersion;

class SysIsuVersionTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIsuVersion();
        parent::__construct();
    }
}