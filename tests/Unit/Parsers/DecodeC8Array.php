<?php

namespace FSAPI\Tests\Unit\Parsers;

use FSAPI\Parsers\DecodeC8Array;

class DecodeC8ArrayTest extends ParserTestCase implements ParserTests
{
    protected $parser = null;
        
        
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->parser = new DecodeC8Array;
        parent::__construct();
    }
}
