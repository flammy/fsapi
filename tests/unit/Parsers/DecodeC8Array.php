<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ParserTests.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ParserTestCase.php");
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
