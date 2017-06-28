<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioEqCustomParam0;

class SysAudioEqCustomParam0Test extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioEqCustomParam0();
        parent::__construct();
    }
}