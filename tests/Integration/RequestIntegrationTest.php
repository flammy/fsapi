<?php
namespace FSAPI\Tests\Integration;

use PHPUnit\Framework\TestCase;

class RequestIntegrationTest extends TestCase
{
    public function testRequestInterceptor()
    {
        $Request = new RequestInterceptor("Response");
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $Request->doRequest('method', 'node', 'attributes', 'delimiter'));
    }
    
    public function testRequestInterceptorFail()
    {
        $this->expectException('FSAPI\Request\RequestException');

        $Request = new RequestInterceptor(false);
        $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
    }
    
    public function testRequestInterceptorFailForbidden()
    {
        $this->expectException('FSAPI\Request\RequestException');

        $Request = new RequestInterceptor('', array('http_code' => 403));
        $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
    }
    
    public function testRequestInterceptorFailTeaPod()
    {
        $this->expectException('FSAPI\Request\RequestException');

        $Request = new RequestInterceptor('', array('http_code' => 418));
        $this->assertFalse($Request->doRequest('method', 'node', 'attributes', 'delimiter'));
    }
}
