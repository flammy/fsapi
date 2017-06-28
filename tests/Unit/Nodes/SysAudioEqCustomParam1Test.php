<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioEqCustomParam1;

class SysAudioEqCustomParam1Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioEqCustomParam1();
        parent::__construct();
    }
}