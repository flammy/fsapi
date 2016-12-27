<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ParserTests.php");

class ParserTestCase extends PHPUnit_Framework_TestCase implements ParserTests
{
    protected $parser = null;
        
    protected $decode = null;
    
    
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->decode = new ParserFactory;
    }
    
    
    /**
     * Basic Testcase to Check of the parser is working
     *
     */
    public function testParseResult()
    {
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $this->parser->ParseResult(2));
    }
}
