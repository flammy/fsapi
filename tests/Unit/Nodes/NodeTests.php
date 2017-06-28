<?php
namespace FSAPI\Tests\Unit\Nodes;

interface NodeTests
{
    public function testGetPath();

    public function testGetValidationMethod();

    public function testGetCallMethods();

    public function testValidateInput();

    public function testCheckCallMethods();
}
