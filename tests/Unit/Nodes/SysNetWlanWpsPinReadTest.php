<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysNetWlanWpsPinRead;

class SysNetWlanWpsPinReadTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanWpsPinRead();
        parent::__construct();
    }
}