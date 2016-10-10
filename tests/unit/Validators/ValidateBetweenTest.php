<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ValidatorTests.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ValidatorTestCase.php");
class ValidateBetweenTest extends ValidatorTestCase implements ValidatorTests
{
    protected $validator = null;
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->validator = new ValidateBetween(array('min' => 20, 'max' => 21));
    }
        
    public function testValidateInputBetween()
    {
        $this->assertFalse($this->validator->validateInput(-1));
        
        $this->assertFalse($this->validator->validateInput(19));
        
        $this->assertTrue($this->validator->validateInput(20));
        
        $this->assertTrue($this->validator->validateInput(21));

        $this->assertFalse($this->validator->validateInput(22));
    }
}
