<?php

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'autoload.php');

$SysInfoVersion = new SysInfoVersion;
$Request = new RequestInterceptor("<fsapiResponse><status>FS_OK</status><value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value></fsapiResponse>");


$fsapi = new FSAPI($Request);
try {
    $result = $fsapi->doRequest("GET", $SysInfoVersion);
} catch (ValidatorException $e) {
    echo $e->getMessage();
}

$parser = new Parser();
$result = $parser->parseResult($result);

$logger = new Logger(10,'Echo');
$logger->critical("bla!");