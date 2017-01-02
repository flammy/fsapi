<?php

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'autoload.php');

$Scanner = new Scanner();

//$Scanner = new ScannerInterceptor(array('bla'),array('blub'));

$ssdp = new SSDP($Scanner);

$bla = $ssdp->doScan();

var_dump($bla);
