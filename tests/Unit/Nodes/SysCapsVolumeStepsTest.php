<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsVolumeSteps;

class SysCapsVolumeStepsTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsVolumeSteps();
        parent::__construct();
    }
}