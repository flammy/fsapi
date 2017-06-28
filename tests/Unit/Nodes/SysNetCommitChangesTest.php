<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetCommitChanges;

class SysNetCommitChangesTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetCommitChanges();
        parent::__construct();
    }
}