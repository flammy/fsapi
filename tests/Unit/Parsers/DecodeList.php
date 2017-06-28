<?php
namespace FSAPI\Tests\Unit\Parsers;

use FSAPI\Parsers\DecodeList;

class DecodeListTest extends ParserTestCase implements ParserTests
{
    protected $parser = null;
        
        
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->parser = new DecodeList;
        parent::__construct();
    }
}
