<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysNetWlanSetPassphrase;

class SysNetWlanSetPassphraseTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysNetWlanSetPassphrase();
        parent::__construct();
    }
}