# FSAPI Documentation

## System

### netRemote.sys.info.version
Method: GET

Returns Image-Version String


```
Example
...
```

### netRemote.sys.info.radioId
Method: GET

Returns uniquie? ID Radio-ID 

```
Example
...
```

### netRemote.sys.info.friendlyName
Method: GET, SET

Sets/ Returns the Network-Name of the Device

```
Example
...
```

### netRemote.sys.net.wired.interfaceEnable
Method: GET

Returns the NIC Status of the Ethernet Device

```
Example
...
```

### netRemote.sys.net.wired.macAddress
Method: GET

Returns the MAC Address of the Ethernet Device

```
Example
...
```

### netRemote.sys.net.wlan.interfaceEnable
Method: GET

Returns the NIC Status of the WIFI Device

```
Example
...
```

### netRemote.sys.net.wlan.macAddress
Method: GET

Returns the MAC Address of the WIFI Device

```
Example
...
```

### netRemote.sys.net.wlan.connectedSSID
Method: GET

Returns the SSID of the connected WIFI network

```
Example
...
```

### netRemote.sys.net.wlan.setEncType
Method: GET

Returns the Encryption Type of the connected WIFI network

```
Example
...
```

### netRemote.sys.net.wlan.setAuthType
Method: GET

Returns the ??? of the connected WIFI network

```
Example
...
```

### netRemote.sys.net.wlan.rssi
Method: GET

Returns the Signal Strenght of the connected WIFI network

```
Example
...
```

### netRemote.sys.net.ipConfig.dhcp
Method: GET

Returns if DHCP is enabled for the connected network

```
Example
...
```

### netRemote.sys.net.ipConfig.address
Method: GET

Returns the IP address for the connected network

```
Example
...
```

### netRemote.sys.net.ipConfig.subnetMask
Method: GET

Returns the subnet mask for the connected network

```
Example
...
```

### netRemote.sys.net.ipConfig.gateway
Method: GET

Returns the default gateway for the connected network

```
Example
...
```

### netRemote.sys.net.ipConfig.dnsPrimary
Method: GET

Returns the primary dns for the connected network

```
Example
...
```

### netRemote.sys.net.ipConfig.dnsSecondary
Method: GET

Returns the secondary dns for the connected network

```
Example
...
```

### netRemote.sys.audio.volume
Method: GET, SET

Sets / Returns the volume of the device

```
Example
...
```

### netRemote.sys.audio.mute
Method: GET, SET

Sets / Returns whether or not device is muted

```
Example
...
```

### netRemote.sys.audio.eqPreset
Method: GET, SET

Sets / Returns the number of the selected eq-presets

```
Example
...
```

### netRemote.sys.audio.eqLoudness
Method: GET, SET

Sets / Returns whether or not loudness is activated

```
Example
...
```

### netRemote.sys.audio.eqCustom.param0
Method: GET, SET

Sets / Returns the first value for costum eq-settings

```
Example
...
```

### netRemote.sys.audio.eqCustom.param1
Method: GET, SET

Sets / Returns the second value for costum eq-settings

```
Example
...
```

### netRemote.sys.caps.dabFreqList
Method: LIST_GET_NEXT

Lists available dab-frequencies  

```
Example
...
```

### netRemote.sys.caps.volumeSteps
Method: GET

Returns the size of the steps for increasing / decreasing the volume

```
Example
...
```

### netRemote.sys.caps.fmFreqRange.lower
Method: GET

Returns the lowest available fm-frequency

```
Example
...
```

### netRemote.sys.caps.fmFreqRange.upper
Method: GET

Returns the highest available fm-frequency

```
Example
...
```

### netRemote.sys.caps.fmFreqRange.stepSize
Method: GET

Returns the size of the steps for increasing / decreasing the frequency

```
Example
...
```

### netRemote.sys.caps.eqPresets
Method: LIST_GET_NEXT

Lists available eq-presets


```
Example
...
```

### netRemote.sys.caps.eqBands
Method: LIST_GET_NEXT

Lists setted modes for the eq

```
Example
...
```

### netRemote.sys.caps.validModes
Method: LIST_GET_NEXT

Lists ???


```
Example
...
```

### netRemote.sys.mode
Method: GET, SET

Sets / Returns the current mode 

```
Example
...
```

### netRemote.sys.power
Method: GET, SET

Sets / Returns the current power state

```
Example
...
```

### netRemote.sys.lang
Method: GET

Returns ???

## Play


### netRemote.play.frequency
Method: GET, SET

Sets / Returns the current frequency for fm (in herz)

```
Example
...
```

### netRemote.play.serviceIds.fmRdsPi
Method: GET

Returns ???

```
Example
...
```

### netRemote.play.scrobble
Method: GET

Returns  whether or not scrobble is enabled or not

```
Example
...
```

### netRemote.play.serviceIds.ecc
Method: GET
Returns ???

```
Example
...
```

### netRemote.play.repeat
Method: GET, SET


Sets / Returns  whether or not repeat is enabled or not

```
Example
...
```

### netRemote.play.info.name
Method: GET

Returns  the first line of the display

```
Example
...
```

### netRemote.play.info.text
Method: GET

Returns  the second line of the display

```
Example
...
```

### netRemote.play.status
Method: GET

Returns status of the player

```
Example
...
```

### netRemote.play.caps
Method: GET

Returns ???

```
Example
...
```

### netRemote.play.shuffle
Method: GET, SET

Sets / Returns  whether or not shuffle is enabled or not

```
Example
...
```

### netRemote.play.control
Method: GET, SET

Sets / Return ??? 

```
Example
...
```

### netRemote.play.info.album
Method: GET

Returns  the name of the album of the current song

```
Example
...
```

### netRemote.play.info.artist
Method: GET

Returns  the name of the artist of the current song

```
Example
...
```

### netRemote.play.info.graphicUri
Method: GET

Returns  the uri of an image representing the current song / station

```
Example
...
```

### netRemote.play.position
Method: GET

Returns the current position in the track


```
Example
...
```

### netRemote.play.info.duration
Method: 

Returns the duration for the track

### netRemote.play.rate
Method: GET

Returns the audio-rate for the track

```
Example
...
```

### netRemote.play.signalStrength
Method: GET

Returns the signal strenght of the current medium


```
Example
...
```

## Nav

### netRemote.nav.action.dabScan
Method: GET

Returns ??? 

```
Example
...
```

### netRemote.nav.status
Method: GET, SET

Sets / Returns ???

```
Example
...
```

### netRemote.nav.presets
Method: LIST_GET_NEXT

Lists ??? 

```
Example
...
```

### netRemote.nav.list
Method: LIST_GET_NEXT

Lists ??? 

```
Example
...
```
           
### netRemote.nav.action.selectItem
Method: GET, SET

Sets / Returns ???

```
Example
...
```

### netRemote.nav.action.navigate
Method: GET, SET

Sets / Returns ???

```
Example
...
```

### netRemote.nav.caps
Method: GET

Sets / Returns ???

```
Example
...
```

### netRemote.nav.state
Method: GET, SET

Sets / Returns ???


```
Example
...
```
