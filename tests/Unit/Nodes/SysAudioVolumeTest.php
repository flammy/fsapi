<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioVolume;

class SysAudioVolumeTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioVolume();
        parent::__construct();
    }
}