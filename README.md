# fsapi - Frontier Silicon API for PHP [![Build Status](https://travis-ci.org/flammy/fsapi.svg?branch=master)](https://travis-ci.org/flammy/fsapi)

**This code is work in progress! It is not finnished yet, feel free co contribute to it.**

This code is developed for Frontier Silicon Ltd. Venice 6.2 chipset and tested with TERRIS® Stereo Internetradio.

In This case there is no spotify mode and there are not so many equalizers. 

Please let me know if it does not work on your device.

## Usage:


**Class Radio**

The radio class provides an easy to use set of human readable methods and parameters.

```
$radio->mute(true);
$radio->mute(false);
$radio->mute('toggle');
```

**Class FSAPI**

The fsapi class provides the abstracted basic communication with the device.

```
$fsapi->call('SET','netRemote.sys.audio.mute',array('value' => true));
$fsapi->call('SET','netRemote.sys.audio.mute',array('value' => false));
```
**Class SSDP (Simple Service Discovery Protocol)**

The ssdp class provices the device discovery via UPNP. This is a verry rudimentary class which does only this one thing. 

```
$ssdp->setDeviceType('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');
$ssdp->scan();
```


**More examples**

You can find more detailed examples in the example folder.


**Example implementation:**

You can find an example implementation in the following repository:

https://github.com/flammy/fsapi-remote

## documentation:

Here you can find a documentation of the raw FSAPI reqests and responses:

https://github.com/flammy/fsapi/blob/master/FSAPI.md
