<?php

namespace FSAPI\Tests\Unit\Validators;

use FSAPI\Validators\ValidateBool;

class ValidateBoolTest extends ValidatorTestCase implements ValidatorTests
{
    protected $validator = null;
        
    public function testValidateInput()
    {
        $validator = new ValidateBool;

        $this->assertFalse($validator->validateInput(-1));
        
        $this->assertTrue($validator->validateInput(0));
        
        $this->assertTrue($validator->validateInput(1));

        $this->assertFalse($validator->validateInput(2));
    }
}
