<?php
class ValidatorIntegrationTest extends PHPUnit_Framework_TestCase
{
    public function testDoRequest()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_OK</status></fsapiResponse>");
        $FSAPI = new FSAPI($Request);
        $SysInfoVersion = new SysInfoVersion;
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $FSAPI->doRequest("SET", $SysInfoVersion, array('value' => 1)));
    }
}
