# fsapi - Frontier Silicon API for PHP [![Build Status](https://travis-ci.org/flammy/fsapi.svg?branch=master)](https://travis-ci.org/flammy/fsapi) [![Maintainability](https://codeclimate.com/github/flammy/fsapi.png)](https://codeclimate.com/github/flammy/fsapi/maintainability)

**This code is work in progress! It is not finished yet, feel free co contribute to it.**

This code is developed for Frontier Silicon Ltd. Venice 6.2 chipset and tested with TERRIS® Stereo Internetradio.

In this case there is no spotify mode and there are not so many equalizers. 

Please let me know if it does not work on your device.

## Usage:


**Class Radio**

The radio class provides an easy to use set of human readable methods and parameters.

```
$Radio = new Radio($host,$pin);
$response = $Radio->radioFrequency(106.4);
$response = $Radio->mute(0);
$response = $Radio->volume(5);
```

**Class FSAPI**

The fsapi class provides the abstracted basic communication with the device.

```
$Request = new Request($host,$session_id,$pin);
$FSAPI = new FSAPI($Request);
$response = $FSAPI->doRequest('SET','netRemote.sys.audio.mute',array('value' => 0));
$response = $FSAPI->doRequest('SET','netRemote.play.frequency'',array('value' => 106400));
$response = $FSAPI->doRequest('SET','netRemote.sys.audio.volume',array('value' => 5));
```
**Class SSDP (Simple Service Discovery Protocol)**

The ssdp class provices the device discovery via UPNP. This is a very rudimentary class which does only this one thing. 

```
$Scanner = new Scanner();
$SSDP = new SSDP($Scanner);
$response = $SSDP->doScan('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');
```


**More examples**

You can find a detailed documentation for the classes at:

https://github.com/flammy/fsapi/blob/master/Documentation.md


**Example implementation:**

You can find an example implementation in the following repository:

https://github.com/flammy/fsapi-remote

## documentation:

You can find a documentation of the raw FSAPI reqests and responses at:

https://github.com/flammy/fsapi/blob/master/FSAPI.md
