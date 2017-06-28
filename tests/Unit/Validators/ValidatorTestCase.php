<?php

namespace FSAPI\Tests\Unit\Validators;

use PHPUnit\Framework\TestCase;

class ValidatorTestCase extends TestCase implements ValidatorTests
{
    protected $validator = null;
    
    public function testValidateInput()
    {
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $this->validator->validateInput("ABC"));
    }
}
