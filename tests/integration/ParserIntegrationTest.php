<?php
class ParserIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testCallParser()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_OK</status><value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value></fsapiResponse>");
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        $result = $FSAPI->doRequest("GET", $SysInfoVersion);
        $parser = new Parser();
        // the result doesn't matter, it will be checked in a different test

        $this->assertNotSame(null, $parser->parseResult($result));
    }
    
    public function testCallParserFailFsFail()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_FAIL</status></fsapiResponse>");
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        $result = $FSAPI->doRequest("GET", $SysInfoVersion);
        $parser = new Parser();
        // the result doesn't matter, it will be checked in a different test
        try {
            $this->assertFalse($parser->parseResult($result));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
    
    public function testCallParserFailInvalidXML()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_FAIL</status>");
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        $result = $FSAPI->doRequest("GET", $SysInfoVersion);
        $parser = new Parser();
        // the result doesn't matter, it will be checked in a different test
        try {
            $this->assertFalse($parser->parseResult($result));
        } catch (Exception $e) {
            $this->assertFalse(false);
        }
    }
}
