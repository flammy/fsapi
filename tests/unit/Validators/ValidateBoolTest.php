<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR."ValidatorTests.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ValidatorTestCase.php");
class ValidateBoolTest extends ValidatorTestCase implements ValidatorTests
{
    protected $validator = null;
        
    public function __construct()
    {
        // set the parser method, this will also be used by inherited test methods
            $this->validator = new ValidateBool;
    }
        
    public function testValidateInputBool()
    {
        $this->assertFalse($this->validator->validateInput(-1));
        
        $this->assertTrue($this->validator->validateInput(0));
        
        $this->assertTrue($this->validator->validateInput(1));

        $this->assertFalse($this->validator->validateInput(2));
    }
}
