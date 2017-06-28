<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavActionSelectPreset;

class NavActionSelectPresetTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavActionSelectPreset();
        parent::__construct();
    }
}