# fsapi - Frontier Silicon API for PHP

**This code is work in progress! It is not finnished yet, feel free co contribute to it.**

This code is developed for Frontier Silicon Ltd. Venice 6.2 chipset and tested with TERRIS® Stereo Internetradio.

In This case there is no spotify mode and there are not so many equalizers. 

Please let me know if it does not work on your device.

## Usage:

**Simple PHP example:**

```
$radio = new radio(); 
$radio->setpin('1337');
$radio->sethost('192.168.0.56');
$response = $radio->friendly_name();
print_r($response);
```

**Example Code:**

You can find an example implementation in the following repository:

https://github.com/flammy/fsapi-remote

## documentation:

Here you can find a documentation of the raw FSAPI reqests and responses:

https://github.com/flammy/fsapi/blob/master/FSAPI.md


## Todo:

### 1 Tuning preset radio stations

Solution: The guys from openhab found a problem while switching the presets. It is necessary to set navigation state to 1 before changing the station with: netRemote.nav.action.selectPreset. After that it should be set to 0.

### 2 FS_NODE_BLOCKED 

Some comands fails with  FS_NODE_BLOCKED, I think it is the same problem as above:
* netRemote.nav.list

### commands in standby

Not all Commands are available if the device is in standby (maybe also in different modes). There should be a blacklist or whitelist to avoid unnecessary requests.
