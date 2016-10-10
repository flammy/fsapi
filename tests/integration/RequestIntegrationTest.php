<?php
class RequestIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testRequestInterceptor()
    {
        $Request = new RequestInterceptor("Response");
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $Request->doRequest('method', 'node', 'attributes', 'delimiter'));
    }
    
    public function testRequestInterceptorFail()
    {
        $Request = new RequestInterceptor(false);
        try {
            $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testRequestInterceptorFailForbidden()
    {
        $Request = new RequestInterceptor('', array('http_code' => 403));
        try {
            $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testRequestInterceptorFailTeaPod()
    {
        $Request = new RequestInterceptor('', array('http_code' => 418));
        try {
            $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
}
