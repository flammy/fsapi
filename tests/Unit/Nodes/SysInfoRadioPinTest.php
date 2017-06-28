<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysInfoRadioPin;

class SysInfoRadioPinTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysInfoRadioPin();
        parent::__construct();
    }
}