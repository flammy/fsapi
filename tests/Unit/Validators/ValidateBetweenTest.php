<?php

namespace FSAPI\Tests\Unit\Validators;

use FSAPI\Validators\ValidateBetween;

class ValidateBetweenTest extends ValidatorTestCase implements ValidatorTests
{
        
    public function testValidateInput()
    {
        $validator = new ValidateBetween(array('min' => 20, 'max' => 21));

        $this->assertFalse($validator->validateInput(-1));
        
        $this->assertFalse($validator->validateInput(19));
        
        $this->assertTrue($validator->validateInput(20));
        
        $this->assertTrue($validator->validateInput(21));

        $this->assertFalse($validator->validateInput(22));
    }
}
