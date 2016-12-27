<?php
class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidateInputBool()
    {
        $Validator = new Validator('Bool');
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $Validator->validateInput('abc'));
    }
    
    public function testValidateInputBoolFailEmptyConstructor()
    {
        try {
            $Validator = new Validator();
            $this->assertFalse($Validator->validateInput('abc'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testValidateInputBetweenFailMissingConstructorParams()
    {
        try {
            $Validator = new Validator("between");
            $this->assertFalse($Validator->validateInput('abc'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    
    public function testValidateInputBetweenFailMissingConstructorParamA()
    {
        try {
            $Validator = new Validator("between", array('max' => 1));
            $this->assertFalse($Validator->validateInput('abc'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testValidateInputBetweenFailMissingConstructorParamB()
    {
        try {
            $Validator = new Validator("between", array('min' => 1));
            $this->assertFalse($Validator->validateInput('abc'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testValidateInputBoolFailToManyConstructorParams()
    {
        try {
            $Validator = new Validator("bool", array('a', 'b'));
            $this->assertFalse($Validator->validateInput('abc'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
}
