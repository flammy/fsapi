<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlatformSoftApUpdateUpdateModeRequest;

class PlatformSoftApUpdateUpdateModeRequestTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlatformSoftApUpdateUpdateModeRequest();
        parent::__construct();
    }
}