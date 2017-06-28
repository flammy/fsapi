<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\SysRsaPublicKey;

class SysRsaPublicKeyTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysRsaPublicKey;
        parent::__construct();
    }
}