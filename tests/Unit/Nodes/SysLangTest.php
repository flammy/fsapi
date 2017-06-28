<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SysLang;

class SysLangTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SysLang();
        parent::__construct();
    }
}