<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioEqCustomParam4;

class SysAudioEqCustomParam4Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioEqCustomParam4();
        parent::__construct();
    }
}