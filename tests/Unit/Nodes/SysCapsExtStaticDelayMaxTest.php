<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsExtStaticDelayMax;

class SysCapsExtStaticDelayMaxTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsExtStaticDelayMax();
        parent::__construct();
    }
}