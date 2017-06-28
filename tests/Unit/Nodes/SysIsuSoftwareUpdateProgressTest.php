<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIsuSoftwareUpdateProgress;

class SysIsuSoftwareUpdateProgressTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIsuSoftwareUpdateProgress();
        parent::__construct();
    }
}