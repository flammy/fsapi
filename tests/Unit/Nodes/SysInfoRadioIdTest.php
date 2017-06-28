<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysInfoRadioId;

class SysInfoRadioIdTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysInfoRadioId();
        parent::__construct();
    }
}