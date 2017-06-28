<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysCapsUtcSettingsList;

class SysCapsUtcSettingsListTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysCapsUtcSettingsList();
        parent::__construct();
    }
}