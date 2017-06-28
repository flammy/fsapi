<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioEqCustomParam3;

class SysAudioEqCustomParam3Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioEqCustomParam3();
        parent::__construct();
    }
}