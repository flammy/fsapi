<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."NodeTests.php");

class NodeTestCase extends PHPUnit_Framework_TestCase implements NodeTests
{
    protected $node = null;

    
    /**
     * Basic Testcase to Check of the node has a fully configured path
     *
     */
    public function testGetPath()
    {
        $this->assertNotSame(null, $this->node->getPath());
    }

    
    /**
     * Basic Testcase to Check of the node has a fully configured validation method
     *
     */
    public function testGetValidationMethod()
    {
        $this->assertNotSame(null, $this->node->getValidationMethod());
    }

    
    /**
     * Basic Testcase to Check of the node has a fully configured call method
     *
     */
    public function testGetCallMethods()
    {
        $this->assertNotSame(null, $this->node->getCallMethods());
    }

    
    /**
     * Basic Testcase to Check of the node has a fully configured validation method
     *
     */
    public function testGetNotification()
    {
        $this->assertNotSame(null, $this->node->getNotification());
    }

    /**
     * Basic Testcase to Check of the node has a working validation method
     *
     */
    public function testValidateInput()
    {
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $this->node->validateInput("abc"));
    }

    /**
     * Basic Testcase to Check of the node has a working check call method
     *
     */
    public function testCheckCallMethodst()
    {
        $call_methods = $this->node->getCallMethods();
        foreach ($call_methods as $call_method) {
            // all configured call methods should return true
            $this->assertEquals(true, $this->node->checkCallMethods($call_method));
        }
        // all not configured call methods should return false
        $this->assertEquals(false, $this->node->checkCallMethods("NOT_FOUND"));
    }
}
