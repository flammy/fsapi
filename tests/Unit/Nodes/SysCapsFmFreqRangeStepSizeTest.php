<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsFmFreqRangeStepSize;

class SysCapsFmFreqRangeStepSizeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsFmFreqRangeStepSize();
        parent::__construct();
    }
}