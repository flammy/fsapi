<?php
namespace FSAPI\Tests\Unit\Parsers;

use FSAPI\Parsers\DecodeU16;

class DecodeU16Test extends ParserTestCase implements ParserTests
{
    protected $parser = null;
        
        
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->parser = new DecodeU16;
        parent::__construct();
    }
        
        
        
    public function testParseResult()
    {
        $this->assertTrue(is_float($this->parser->ParseResult(0)));
            
        $this->assertTrue(is_float($this->parser->ParseResult(2.5)));
            
        $this->assertTrue(is_float($this->parser->ParseResult(8)));
            
        $this->assertTrue(is_float($this->parser->ParseResult('ABC')));
    }
}
