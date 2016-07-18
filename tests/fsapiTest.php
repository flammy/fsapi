<?php
class fsapiTest extends PHPUnit_Framework_TestCase{


       public function testGetSetUnittestActive(){
               $fsapi = new fsapi();
               $this->assertEquals(false, $fsapi->getunittest_active());
               $fsapi->setunittest_active(true);
               $this->assertEquals(true, $fsapi->getunittest_active());
       }


       public function testGetSetUnittestData(){
               $fsapi = new fsapi();
               $this->assertEquals(array(), $fsapi->getunittest_data());
               $fsapi->setunittest_data(array('test'));
               $this->assertEquals(array('test'), $fsapi->getunittest_data());
       }



    public function testGetSetPin(){
	$fsapi = new fsapi();
	$input = rand(0,9999);
	$fsapi->setpin($input);
        $this->assertEquals($input, $fsapi->getpin());
    }


    public function testGetSetHost(){
	$fsapi = new fsapi();
	$input = "HOST";
	$fsapi->sethost($input);
        $this->assertEquals($input, $fsapi->gethost());
    }


    public function testGetSetSid(){
	$fsapi = new fsapi();
	$input = md5(time());
	$fsapi->setsid($input);
        $this->assertEquals($input, $fsapi->getsid());
    }


    public function testGetSetRw(){
	$fsapi = new fsapi();
	$input = array('key' => 'value');
	$fsapi->setrw($input);
        $this->assertEquals($input, $fsapi->getrw());
    }

    public function testGetSetValidation(){
	$fsapi = new fsapi();
	$input = array('key' => 'value');
	$fsapi->setvalidation($input);
        $this->assertEquals($input, $fsapi->getvalidation());
    }


    public function testGetSetOperation(){
	$fsapi = new fsapi();
	$input = array('key' => 'value');
	$fsapi->setoperation($input);
        $this->assertEquals($input, $fsapi->getoperation());
    }

    public function testGetSetLogLevel(){
	$fsapi = new fsapi();
	$input = array('key' => 'value');
	$fsapi->setloglevel($input);
        $this->assertEquals($input, $fsapi->getloglevel());
    }
    public function testGetSetLogTarget(){
	$fsapi = new fsapi();
	$input = array('key' => 'value');
	$fsapi->setlogtarget($input);
        $this->assertEquals($input, $fsapi->getlogtarget());
    }


    public function testConstructorRw(){
	$fsapi = new fsapi();
	$this->assertGreaterThan(0,count($fsapi->getrw()));
    }


    public function testConstructorValidation(){
	$fsapi = new fsapi();
	$this->assertGreaterThan(0,count($fsapi->getvalidation()));
    }


    public function testConstructorLoglevel(){
	$fsapi = new fsapi();
	$this->assertEquals(0, $fsapi->getloglevel());
    }

    public function testConstructorLogtarget(){
	$fsapi = new fsapi();
	$this->assertEquals(FALSE, $fsapi->getlogtarget());
    }



    public function testEncode(){
	$fsapi = new fsapi();
	$test_input = array();
	$test_input[] = array('test' => array('u8' =>  ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('u16' => ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('u32' => ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('s8' =>  ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('s16' =>  ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('s32' =>  ' 2.5 '), 'expected' => 2.5);
	$test_input[] = array('test' => array('c8_array' =>  ' abcdefg '), 'expected' => 'abcdefg');
	$test_input[] = array('test' => array('array' =>  'ff00ff'), 'expected' => pack('H*', 'ff00ff'));
	foreach($test_input as $input){
		$this->assertEquals($fsapi->encode($input['test']), $input['expected']);
	}
    }
    public function testEncodeList(){
	$fsapi = new fsapi();
    }


    public function testValidateBool(){
	$fsapi = new fsapi();

	$result = $fsapi->validate(true, array( 0 => 'bool'));
	$this->assertEquals($result[0], true);

	$result = $fsapi->validate(false, array( 0 => 'bool'));
	$this->assertEquals($result[0], true);

	$result = $fsapi->validate(0, array( 0 => 'bool'));
	$this->assertEquals($result[0], true);

	$result = $fsapi->validate(1, array( 0 => 'bool'));
	$this->assertEquals($result[0], true);

        $result = $fsapi->validate(2, array( 0 => 'bool'));
	$this->assertEquals($result[0], false);

	$result = $fsapi->validate('aaa', array( 0 => 'bool'));
	$this->assertEquals($result[0], false);

    }



    public function testValidateBetween(){
	$fsapi = new fsapi();

	$result = $fsapi->validate(2, array(0 => 'between', 1 => array(0,5)));
	$this->assertEquals($result[0], true);

	$result = $fsapi->validate(1, array(0 => 'between', 1 => array(2,5)));
	$this->assertEquals($result[0], false);

	$result = $fsapi->validate('abc', array(0 => 'between', 1 => array(2,5)));
	$this->assertEquals($result[0], false);
    }


public function testValidateNoRule(){
	$fsapi = new fsapi();
	$result = $fsapi->validate('abc', array( 0 => 'notfound'));
	$this->assertEquals($result[0], false);

    }


    public function testCallNoPin(){
	$fsapi = new fsapi();
	$fsapi->setpin(null);
	$result = $fsapi->call('operation');
	$this->assertEquals($result[0], false);
    }

    public function testCallWrongOperation(){
	$fsapi = new fsapi();
	$result = $fsapi->call('operation');
	$this->assertEquals($result[0], false);
    }


    public function testCallNotAllowedOperation(){
	$fsapi = new fsapi();
	$result = $fsapi->call('operation','node');
	$this->assertEquals($result[0], false);
    }

    public function testIoDater(){
	$fsapi = new fsapi();
	$message = "teststring";
	$ts = time();
	$result = $fsapi->ioDater($message);
	$preg_result = preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2} '.$message.'$/', $result,$matches);
	$this->assertEquals($preg_result, 1);
	$this->assertGreaterThanOrEqual(strtotime($matches[0]),$ts);


    }

    public function testIoLogger(){
    	$fsapi = new fsapi();
    	$message = "teststring";
    	$ts = time();
    	$tempnam = tempnam("/tmp", "FSAPI");

    	$fsapi->setloglevel(3);
    	//$fsapi->ioLogger($message,3,'ECHO');
    	//$fsapi->ioLogger($message,3,'STDERR');
    	//$fsapi->ioLogger($message,3,'STDOUT');
    	if($tempnam !== false){
    		$fsapi->ioLogger($message,2,$tempnam);
    		$file_contents = trim(file_get_contents($tempnam));
    		$preg_result = preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2} \''.$message.'\'$/', $file_contents,$matches);
    		$this->assertEquals($preg_result, 1);
    		$this->assertGreaterThanOrEqual(strtotime($matches[0]),$ts);
    		unlink($tempnam);
    	}
    	ob_start();
    	$fsapi->ioLogger($message,2,'ECHO');
    	$ob_contents = ob_get_clean();
		$preg_result = preg_match('/^\''.$message.'\'$/', $ob_contents,$matches);
		$this->assertEquals($preg_result, 1);

    }
}