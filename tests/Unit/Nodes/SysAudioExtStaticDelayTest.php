<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysAudioExtStaticDelay;

class SysAudioExtStaticDelayTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysAudioExtStaticDelay();
        parent::__construct();
    }
}