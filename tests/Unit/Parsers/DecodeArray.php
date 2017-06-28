<?php
namespace FSAPI\Tests\Unit\Parsers;

use FSAPI\Parsers\DecodeArray;

class DecodeArrayTest extends ParserTestCase implements ParserTests
{
    protected $parser = null;
        
        
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->parser = new DecodeArray;
        parent::__construct();
    }
}
