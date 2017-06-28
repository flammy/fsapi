<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysIsuMandatory;

class SysIsuMandatoryTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysIsuMandatory();
        parent::__construct();
    }
}