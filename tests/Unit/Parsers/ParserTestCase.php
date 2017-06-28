<?php
namespace FSAPI\Tests\Unit\Parsers;

use PHPUnit\Framework\TestCase;

use FSAPI\Parsers\ParserFactory;

class ParserTestCase extends TestCase implements ParserTests
{
    protected $parser = null;
        
    protected $decode = null;
    
    
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->decode = new ParserFactory;

        parent::__construct();
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
