<?php
function __autoload($class_name) {
    include dirname(__file__).'/../src/'.$class_name . '.php';
}

/**
 * Credentials
 */

$radio = new radio();
$radio->setpin('1337');
$radio->sethost('192.168.0.46');
// There is no need to obtain a session, this is done automaticaly by the first command connecting to the radio.


/**
 * Logging
 */


// set the logger to log to stdout
$radio->setDebugTarget('STDOUT');
// set the level at which the log is written to the log target (STDOUT)
$radio->setDebugLevel(2);
// Log Start to STDOUT
$radio->debug('START',1);
// Do not Log Start to STDOUT,because loglevel is to high
$radio->debug('hidden',3);

/**
 * Basic
 */


// Get the current power state of the device (on or off)
$response = $radio->power();
$radio->debug($response,1);

// power on
$response = $radio->power(1);
$radio->debug($response,1);

// power off
$response = $radio->power(0);
$radio->debug($response,1);

// power switch it back on (inverts the current state)
$response = $radio->power('toggle');
$radio->debug($response,1);

// Get a list with valid operation modes for the device
$response = $radio->validModes();
$radio->debug($response,1);

// Switch the Device to Mode 2
$response = $radio->mode(2);
$radio->debug($response,1);

// Get the current navigation
$response = $radio->NavLists();
$radio->debug($response,1);

?>
