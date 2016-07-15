<?php
class radioTest extends PHPUnit_Framework_TestCase{


    private $responseset = array(
        'CURL_ERROR' => array(  
                        'response' => false, 
                        'info' => array(),
                        'curl_error' => 'CURL_ERROR'),
        'HTTP_403' => array(    
                        'response' => 'FORBIDDEN', 
                        'info' => array('http_code' => 403),
                        'curl_error' => ''),
        'HTTP_404' => array(    
                        'response' => 'NOT_FOUND', 
                        'info' => array('http_code' => 404),
                        'curl_error' => ''),
        'HTTP_500' => array(    
                        'response' => 'SERVER ERROR', 
                        'info' => array('http_code' => 500),
                        'curl_error' => ''),
        'FS_OK' => array(    
                        'response' => '<fsapiResponse><status>FS_OK</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_FAIL' => array(    
                        'response' => '<fsapiResponse><status>FS_FAIL</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_PACKET_BAD' => array(    
                        'response' => '<fsapiResponse><status>FS_PACKET_BAD</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_NODE_BLOCKED' => array(    
                        'response' => '<fsapiResponse><status>FS_NODE_BLOCKED</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_NODE_DOES_NOT_EXIST' => array(    
                        'response' => '<fsapiResponse><status>FS_NODE_DOES_NOT_EXIST</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_TIMEOUT' => array(    
                        'response' => '<fsapiResponse><status>FS_TIMEOUT</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),
        'FS_LIST_END' => array( 
                        'response' => '<fsapiResponse><status>FS_LIST_END</status>###VALUE###</fsapiResponse>', 
                        'info' => array('http_code' => 200),
                        'curl_error' => ''),

        );



    private function prepareAnswer($template, $value = null, $status = null){ 
        $responseset = $this->responseset;
        if(isset($responseset[$template])){
            $return = $responseset[$template];
            if($value !== null ){
                $return['response'] = str_replace('###VALUE###', $value, $return['response']);
            }
            if($status !== null ){
                $return['response'] = str_replace('###'.$template.'###', $value, $return['response']);
            }
            return $return;


        }else{
            return array(false,'template not found');
        }
    }












    public function testGetSetUnittestActive(){
        $radio = new radio();
        $this->assertEquals(false, $radio->getunittest_active());
        $radio->setunittest_active(true);
        $this->assertEquals(true, $radio->getunittest_active());
    }


    public function testGetSetUnittestData(){
        $radio = new radio();
        $this->assertEquals(array(), $radio->getunittest_data());
        $radio->setunittest_data(array('test'));
        $this->assertEquals(array('test'), $radio->getunittest_data());
    }


    public function testGetSetPin(){
		$radio = new radio();
		$input = rand(0,9999);
		$radio->setpin($input);
        $this->assertEquals($input, $radio->getpin());
    }


    public function testGetSetHost(){
		$radio = new radio();
		$input = "HOST";
		$radio->sethost($input);
        $this->assertEquals($input, $radio->gethost());
    }

    public function testCredentials(){
    	$radio = new radio();

        $result = $radio->check_credentials();
    	$this->assertEquals($result,array(false,'no pin set'));
		$input = rand(0,9999);
		
        $radio->setpin($input);
    	$result = $radio->check_credentials();
    	$this->assertEquals($result,array(false,'no host set'));
        
        $input = 'HOST';
        $radio->sethost($input);
        $radio->setunittest_active(true);
        
        $unittest_data = $this->prepareAnswer('CURL_ERROR');
        $radio->setunittest_data($unittest_data);
        $result = $radio->check_credentials();
        $this->assertEquals($result,array(false,'CURL_ERROR'));
        
        $unittest_data = $this->prepareAnswer('FS_OK','OK');
        $radio->setunittest_data($unittest_data);
        $result = $radio->check_credentials();
        $this->assertEquals($result,array(true,'SESSION_OK'));
        
    }

    public function testGetSet(){
        $radio = new radio();
        $radio->setpin(rand(0,9999));
        $radio->sethost('HOST');
        $radio->setunittest_active(true);

        $unittest_data = $this->prepareAnswer('FS_OK',10);
        $radio->setunittest_data($unittest_data);


        $result =  $radio->getSet('netRemote.sys.audio.volume','ABC');
        $this->assertEquals($result,array(false,'Validation for netRemote.sys.audio.volume failed: Value ABC is not between 0 and 20'));
    }



    
    


}


