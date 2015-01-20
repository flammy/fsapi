# fsapi - Frontier Silicon API for PHP

This code is developed for Frontier Silicon Ltd. Venice 6.2 chipset and tested with TERRIS® Stereo Internetradio.

In This case there is no spotify mode and there are not so many equalizers.

Usage:

$radio = new radio();
$radio->setpin('1337');
$radio->sethost('192.168.0.56');


$response = $radio->friendly_name();
print_r($response);


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
