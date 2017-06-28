<?php
namespace FSAPI\Tests\Unit\Nodes;

use FSAPI\Nodes\AirplaySetPassword;

class AirplaySetPasswordTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new AirplaySetPassword;
        parent::__construct();
    }
}