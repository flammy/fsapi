<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetKeepConnected;

class SysNetKeepConnectedTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetKeepConnected();
        parent::__construct();
    }
}