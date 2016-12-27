<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."NodeTests.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."NodeTestCase.php");

class NavStateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new NavState;
    }
}