<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCfgIrAutoPlayFlag;

class SysCfgIrAutoPlayFlagTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCfgIrAutoPlayFlag();
        parent::__construct();
    }
}