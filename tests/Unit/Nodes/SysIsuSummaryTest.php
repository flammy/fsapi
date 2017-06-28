<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIsuSummary;

class SysIsuSummaryTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIsuSummary();
        parent::__construct();
    }
}