<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioEqLoudness;

class SysAudioEqLoudnessTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioEqLoudness();
        parent::__construct();
    }
}