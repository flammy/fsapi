<?php

namespace FSAPI\Tests\Integration;

use PHPUnit\Framework\TestCase;

use FSAPI\FSAPI;
use FSAPI\Nodes\SysAudioVolume;

class ValidatorIntegrationTest extends TestCase
{
    public function testDoRequest()
    {
        $Request = new RequestInterceptor("<fsapiResponse><status>FS_OK</status></fsapiResponse>");
        $FSAPI = new FSAPI($Request);
        $SysAudioVolume = new SysAudioVolume;
        // the result doesn't matter, it will be checked in a different test
        $this->assertNotSame(null, $FSAPI->doRequest("SET", $SysAudioVolume, array('value' => 1)));
    }
}
