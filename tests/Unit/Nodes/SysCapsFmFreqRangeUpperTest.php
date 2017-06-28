<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsFmFreqRangeUpper;

class SysCapsFmFreqRangeUpperTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsFmFreqRangeUpper();
        parent::__construct();
    }
}