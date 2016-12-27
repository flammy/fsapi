<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ParserTests.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ParserTestCase.php");
class DecodeS16Test extends ParserTestCase implements ParserTests
{
    protected $parser = null;
        
        
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->parser = new DecodeS16;
        parent::__construct();
    }
        
        
        
    public function testParserResult()
    {
        $this->assertTrue(is_float($this->parser->ParseResult(0)));
            
        $this->assertTrue(is_float($this->parser->ParseResult(2.5)));
            
        $this->assertTrue(is_float($this->parser->ParseResult(8)));
            
        $this->assertTrue(is_float($this->parser->ParseResult('ABC')));
    }
}
