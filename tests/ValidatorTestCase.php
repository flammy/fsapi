<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ValidatorTests.php");

class ValidatorTestCase extends PHPUnit_Framework_TestCase implements ValidatorTests
{
    protected $validator = null;
    
    public function testValidateInput()
    {
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $this->validator->validateInput("ABC"));
    }
}
