<?php

namespace FSAPI\Tests\Unit\Validators;

use FSAPI\Validators\Validator;

use PHPUnit\Framework\TestCase;


class ValidatorTest extends TestCase
{
    public function testValidateInputBool()
    {
        $Validator = new Validator('Bool');
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $Validator->validateInput('abc'));
    }
    
    public function testValidateInputBoolFailEmptyConstructor()
    {

        if(method_exists($this,'expectException')){
                $this->expectException('FSAPI\Validators\ValidatorException');
        }
        if(method_exists($this,'setExpectedException')){
                $this->setExpectedException('FSAPI\Validators\ValidatorException');
        }
        $Validator = new Validator('');
        $this->assertFalse($Validator->validateInput('abc'));
    }
    
    public function testValidateInputBetweenFailMissingConstructorParams()
    {
        if(method_exists($this,'expectException')){
                $this->expectException('FSAPI\Validators\ValidatorException');
        }
        if(method_exists($this,'setExpectedException')){
                $this->setExpectedException('FSAPI\Validators\ValidatorException');
        }
        $Validator = new Validator("between");
        $this->assertFalse($Validator->validateInput('abc'));
    }
    
    
    public function testValidateInputBetweenFailMissingConstructorParamA()
    {
        if(method_exists($this,'expectException')){
                $this->expectException('FSAPI\Validators\ValidatorException');
        }
        if(method_exists($this,'setExpectedException')){
                $this->setExpectedException('FSAPI\Validators\ValidatorException');
        }
        $Validator = new Validator("between", array('max' => 1));
        $this->assertFalse($Validator->validateInput('abc'));
    }
    
    public function testValidateInputBetweenFailMissingConstructorParamB()
    {
        if(method_exists($this,'expectException')){
                $this->expectException('FSAPI\Validators\ValidatorException');
        }
        if(method_exists($this,'setExpectedException')){
                $this->setExpectedException('FSAPI\Validators\ValidatorException');
        }
        $Validator = new Validator("between", array('min' => 1));
        $this->assertFalse($Validator->validateInput('abc'));
    }
    
    public function testValidateInputBoolFailToManyConstructorParams()
    {
        if(method_exists($this,'expectException')){
                $this->expectException('FSAPI\Validators\ValidatorException');
        }
        if(method_exists($this,'setExpectedException')){
                $this->setExpectedException('FSAPI\Validators\ValidatorException');
        }
        $Validator = new Validator("bool", array('a', 'b'));
        $this->assertFalse($Validator->validateInput('abc'));
    }
}
