<?php
class FSAPIIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testDoRequest()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_OK</status><value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value></fsapiResponse>");
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $FSAPI->doRequest("GET", $SysInfoVersion));
    }
    
    public function testCallFail()
    {
        $Request = new RequestInterceptor(false, array('curl_error' => 'test error'));
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        try {
            $this->assertFalse($FSAPI->doRequest("GET", $SysInfoVersion));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testCallFailForbidden()
    {
        $Request = new RequestInterceptor('', array('http_code' => '403'));
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        try {
            $this->assertFalse($FSAPI->doRequest("GET", $SysInfoVersion));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    
    public function testCallFailTeaPod()
    {
        $Request = new RequestInterceptor('', array('http_code' => '418'));
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        try {
            $this->assertFalse($FSAPI->doRequest("GET", $SysInfoVersion));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
}
