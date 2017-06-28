<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysClockDateFormat;

class SysClockDateFormatTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysClockDateFormat();
        parent::__construct();
    }
}