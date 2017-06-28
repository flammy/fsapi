<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\NavSearchTerm;

class NavSearchTermTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavSearchTerm();
        parent::__construct();
    }
}