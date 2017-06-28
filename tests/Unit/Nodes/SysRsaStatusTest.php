<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysRsaStatus;

class SysRsaStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysRsaStatus;
        parent::__construct();
    }
}