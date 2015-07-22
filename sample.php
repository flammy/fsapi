<?php
include('radio.php');

$radio = new radio();

// logging
$radio->setDebugLevel(3);
$radio->setDebugTarget(dirname(__file__). DIRECTORY_SEPARATOR ."debug.log");





$radio->setpin('1337');
$radio->sethost('192.168.0.46');

$response = $radio->friendly_name();

//$radio->debug($response,2);



/*


$response = $radio->mode(2);

print_r($response);

$response = $radio->eq_preset(0);

print_r($response);

$response = $radio->power();

print_r($response);

$response = $radio->mute(false);

print_r($response);

$response = $radio->system_info();

print_r($response);

$response = $radio->system_status();

print_r($response);


$response = $radio->system_status();


$response = $radio->radioFrequency(10);

$response = $radio->NavPresets();


print_r($response);


$response = $radio->SelectPreset(2);


print_r($response);
*/

?>
