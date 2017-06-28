<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\AirplayClearPassword;

class AirplayClearPasswordTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new AirplayClearPassword;
        parent::__construct();
    }
}