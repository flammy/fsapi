<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsFmFreqRangeLower;

class SysCapsFmFreqRangeLowerTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsFmFreqRangeLower();
        parent::__construct();
    }
}