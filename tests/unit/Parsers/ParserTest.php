<?php
class ParserTest extends PHPUnit_Framework_TestCase implements ParserTests
{
    protected $decode = null;
    
    
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->decode = new ParserFactory;
        parent::__construct();
    }
    
    
    /**
     * Basic Testcase to Check of the parser factory is working
     *
     */
    public function testParseResult()
    {
        // check if the parser C8Array is present
        $xml = new SimpleXMLElement("<value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value>");
        $this->assertNotSame(null, $this->decode->parseResult($xml));
    }
}
