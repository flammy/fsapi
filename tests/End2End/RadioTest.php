<?php
namespace FSAPI\Tests\End2End;

use PHPUnit\Framework\TestCase;

use FSAPI\FSAPI;
use FSAPI\Radio;

class RadioTest extends TestCase
{

    public function testRadio(){
        $radio = new Radio('http://192.168.178.23','1337');
        $result = $radio->volume();
        $this->assertTrue(is_numeric($result));
    }

}