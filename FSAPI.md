# FSAPI Documentation

The device returns allways an XML set like this:

```
<fsapiResponse>
<status>STATUS</status>
VALUE
</fsapiResponse>
...
```

Where STATUS should be FS_OK if everything is fine with the request.

To keep it simple I will only mention the VALUE field.


## System

### netRemote.sys.info.version
Method: GET

Returns Image-Version String


```
/fsapi/GET/netRemote.sys.info.version?pin=1337&sid=1784185740

<value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value>
```

### netRemote.sys.info.radioId
Method: GET

Returns uniquie? ID Radio-ID 

```
/fsapi/GET/netRemote.sys.info.radioId?pin=1337&sid=1720678490

<value><c8_array>001122AABBCC</c8_array></value>

```

### netRemote.sys.info.friendlyName
Method: GET, SET

Sets/ Returns the Network-Name of the Device

```
/fsapi/GET/netRemote.sys.info.friendlyName?pin=1337&sid=1947840669

<value><c8_array>Radio</c8_array></value>
...
```

### netRemote.sys.net.wired.interfaceEnable
Method: GET

Returns the NIC Status of the Ethernet Device

```
/fsapi/GET/netRemote.sys.net.wired.interfaceEnable?pin=1337&sid=441427276
<value><u8>1</u8></value>
...
```

### netRemote.sys.net.wired.macAddress
Method: GET

Returns the MAC Address of the Ethernet Device

```
/fsapi/GET/netRemote.sys.net.wired.macAddress?pin=1337&sid=636641042

<value><c8_array>00:11:22:33:44:FF</c8_array></value>
...
```

### netRemote.sys.net.wlan.interfaceEnable
Method: GET

Returns the NIC Status of the WIFI Device

```
/fsapi/GET/netRemote.sys.net.wlan.interfaceEnable?pin=1337&sid=1390762771

<value><u8>0</u8></value>
...
```

### netRemote.sys.net.wlan.macAddress
Method: GET

Returns the MAC Address of the WIFI Device

```
/fsapi/GET/netRemote.sys.net.wlan.macAddress?pin=1337&sid=32327402

<value><c8_array>00:11:22:33:44:FF</c8_array></value>
...
```

### netRemote.sys.net.wlan.connectedSSID
Method: GET

Returns the SSID of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.connectedSSID?pin=1337&sid=829201793

Example...
...
```

### netRemote.sys.net.wlan.setEncType
Method: GET

Returns the Encryption Type of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.setEncType?pin=1337&sid=1860534785

Example...
...
```

### netRemote.sys.net.wlan.setAuthType
Method: GET

Returns the ??? of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.setAuthType?pin=1337&sid=924278502

Example...
...
```

### netRemote.sys.net.wlan.rssi
Method: GET

Returns the Signal Strenght of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.rssi?pin=1337&sid=1681224474
<value><u8>100</u8></value>
...
```

### netRemote.sys.net.ipConfig.dhcp
Method: GET

Returns if DHCP is enabled for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dhcp?pin=1337&sid=208317414

<value><u8>1</u8></value>
...
```

### netRemote.sys.net.ipConfig.address
Method: GET

Returns the IP address for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.address?pin=1337&sid=1178490789


<value><u32>3232235576</u32></value>
...
```

### netRemote.sys.net.ipConfig.subnetMask
Method: GET

Returns the subnet mask for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.subnetMask?pin=1337&sid=1852331719

<value><u32>4294967040</u32></value>
...
```

### netRemote.sys.net.ipConfig.gateway
Method: GET

Returns the default gateway for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.gateway?pin=1337&sid=1545150372


<value><u32>3232235521</u32></value>
...
```

### netRemote.sys.net.ipConfig.dnsPrimary
Method: GET

Returns the primary dns for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dnsPrimary?pin=1337&sid=1796481137

<value><u32>3232235521</u32></value>
...
```

### netRemote.sys.net.ipConfig.dnsSecondary
Method: GET

Returns the secondary dns for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dnsSecondary?pin=1337&sid=1171925458

<value><u32>0</u32></value>
...
```

### netRemote.sys.audio.volume
Method: GET, SET

Sets / Returns the volume of the device

```
/fsapi/GET/netRemote.sys.audio.volume?pin=1337&sid=218069529

<value><u8>4</u8></value>
...
```

### netRemote.sys.audio.mute
Method: GET, SET

Sets / Returns whether or not device is muted

```
/fsapi/GET/netRemote.sys.audio.mute?pin=1337&sid=1932538906

<value><u8>0</u8></value>
...
```

### netRemote.sys.audio.eqPreset
Method: GET, SET

Sets / Returns the number of the selected eq-presets

```
/fsapi/GET/netRemote.sys.audio.eqPreset?pin=1337&sid=643480027

<value><u8>5</u8></value>
...
```

### netRemote.sys.audio.eqLoudness
Method: GET, SET

Sets / Returns whether or not loudness is activated

```
/fsapi/GET/netRemote.sys.audio.eqLoudness?pin=1337&sid=1033306501

<value><u8>0</u8></value>
...
```

### netRemote.sys.audio.eqCustom.param0
Method: GET, SET

Sets / Returns the first value for costum eq-settings

```
/fsapi/GET/netRemote.sys.audio.eqCustom.param0?pin=1337&sid=1789657498

<value><s16>1</s16></value>
...
```

### netRemote.sys.audio.eqCustom.param1
Method: GET, SET

Sets / Returns the second value for costum eq-settings

```
/fsapi/GET/netRemote.sys.audio.eqCustom.param1?pin=1337&sid=1636927329

<value><s16>1</s16></value>
...
```

### netRemote.sys.caps.dabFreqList
Method: LIST_GET_NEXT

Lists available dab-frequencies  

```
Example ???
...
```

### netRemote.sys.caps.volumeSteps
Method: GET

Returns the max volume level

```
/fsapi/GET/netRemote.sys.caps.volumeSteps?pin=1337&sid=896363579

<value><u8>21</u8></value>
...
```

### netRemote.sys.caps.fmFreqRange.lower
Method: GET

Returns the lowest available fm-frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.lower?pin=1337&sid=1005285685

<value><u32>87500</u32></value>
...
```

### netRemote.sys.caps.fmFreqRange.upper
Method: GET

Returns the highest available fm-frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.upper?pin=1337&sid=1771149341

<value><u32>108000</u32></value>
...
```

### netRemote.sys.caps.fmFreqRange.stepSize
Method: GET

Returns the size of the steps for increasing / decreasing the frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.stepSize?pin=1337&sid=1369641108

<value><u32>50</u32></value>
...
```

### netRemote.sys.caps.eqPresets
Method: LIST_GET_NEXT

Lists available eq-presets


```
/fsapi/LIST_GET_NEXT/netRemote.sys.caps.eqPresets/-1?pin=1337&sid=2058329265&maxItems=100

<item key="0">
<field name="label"><c8_array>Benutzer</c8_array></field>

</item>
<item key="1">
<field name="label"><c8_array>Normal</c8_array></field>
[...]
<listend/>

```

### netRemote.sys.caps.eqBands
Method: LIST_GET_NEXT

Lists setted modes for the eq

```
/fsapi/LIST_GET_NEXT/netRemote.sys.caps.eqBands/-1?pin=1337&sid=1082454528&maxItems=100


<item key="0">
<field name="label"><c8_array>Bass</c8_array></field>
<field name="min"><s16>-4</s16></field>
<field name="max"><s16>4</s16></field>

</item>
<item key="1">
<field name="label"><c8_array>Höhen</c8_array></field>
<field name="min"><s16>-4</s16></field>
<field name="max"><s16>4</s16></field>

</item>
<listend/>

```

### netRemote.sys.caps.validModes
Method: LIST_GET_NEXT

Lists valid operation modes


```
/fsapi/LIST_GET_NEXT/netRemote.sys.caps.validModes/-1?pin=1337&sid=300029608&maxItems=100

<item key="0">
<field name="id"><c8_array>IR</c8_array></field>
<field name="selectable"><u8>1</u8></field>
<field name="label"><c8_array>Internet Radio</c8_array></field>

</item>
<item key="1">
<field name="id"><c8_array>MP</c8_array></field>
<field name="selectable"><u8>1</u8></field>
<field name="label"><c8_array>Musik Archiv </c8_array></field>
[...]
<listend/>
```

### netRemote.sys.mode
Method: GET, SET

Sets / Returns the current mode 

```
/fsapi/GET/netRemote.sys.mode?pin=1337&sid=300029608

<value><u32>4294967295</u32></value>
```

### netRemote.sys.power
Method: GET, SET

Sets / Returns the current power state

```
/fsapi/GET/netRemote.sys.power?pin=1337&sid=150145723

<value><u8>0</u8></value>
...
```

### netRemote.sys.lang
Method: GET

Returns ???

```
/fsapi/GET/netRemote.sys.lang?pin=1337&sid=539517630

<value><u32>0</u32></value>
```


## Play


### netRemote.play.frequency
Method: GET, SET

Sets / Returns the current frequency for fm (in herz)

```
/fsapi/GET/netRemote.play.frequency?pin=1337&sid=615989613

<value><u32>4294967295</u32></value>
```

### netRemote.play.serviceIds.fmRdsPi
Method: GET

Returns ???

```
/fsapi/GET/netRemote.play.serviceIds.fmRdsPi?pin=1337&sid=561010477

<value><u16>0</u16></value>
...
```

### netRemote.play.scrobble
Method: GET

Returns  whether or not scrobble is enabled or not

```
/fsapi/GET/netRemote.play.scrobble?pin=1337&sid=1961792010


<value><u8>0</u8></value>
```

### netRemote.play.serviceIds.ecc
Method: GET
Returns ???

```
/fsapi/GET/netRemote.play.serviceIds.ecc?pin=1337&sid=1194891835


<value><u8>0</u8></value>
```

### netRemote.play.repeat
Method: GET, SET


Sets / Returns  whether or not repeat is enabled or not

```
/fsapi/GET/netRemote.play.repeat?pin=1337&sid=506326863


<value><u8>0</u8></value>
```

### netRemote.play.info.name
Method: GET

Returns  the first line of the display

```
/fsapi/GET/netRemote.play.info.name?pin=1337&sid=548290233


<value><c8_array></c8_array></value>
```

### netRemote.play.info.text
Method: GET

Returns  the second line of the display

```
/fsapi/GET/netRemote.play.info.text?pin=1337&sid=429343323

<value><c8_array></c8_array></value>

```

### netRemote.play.status
Method: GET

Returns status of the player

```
/fsapi/GET/netRemote.play.status?pin=1337&sid=973104948


<value><u8>0</u8></value>
...
```

### netRemote.play.caps
Method: GET

Returns ???

```
/fsapi/GET/netRemote.play.caps?pin=1337&sid=1672745554


<value><u32>0</u32></value>
```

### netRemote.play.shuffle
Method: GET, SET

Sets / Returns  whether or not shuffle is enabled or not

```
/fsapi/GET/netRemote.play.shuffle?pin=1337&sid=1843354907

<value><u8>0</u8></value>
...
```

### netRemote.play.control
Method: GET, SET

Sets / Return ??? 

```
/fsapi/GET/netRemote.play.control?pin=1337&sid=1737628193

<value><u8>0</u8></value>
```

### netRemote.play.info.album
Method: GET

Returns  the name of the album of the current song

```
/fsapi/GET/netRemote.play.info.album?pin=1337&sid=23681281


<value><c8_array></c8_array></value>
```

### netRemote.play.info.artist
Method: GET

Returns  the name of the artist of the current song

```
/fsapi/GET/netRemote.play.info.artist?pin=1337&sid=1303639071

<value><c8_array></c8_array></value>
```

### netRemote.play.info.graphicUri
Method: GET

Returns  the uri of an image representing the current song / station

```
/fsapi/GET/netRemote.play.info.graphicUri?pin=1337&sid=1566925260

<value><c8_array></c8_array></value>
```

### netRemote.play.position
Method: GET

Returns the current position in the track


```
/fsapi/GET/netRemote.play.position?pin=1337&sid=984827477

<value><u32>0</u32></value>
```

### netRemote.play.info.duration
Method: 

Returns the duration for the track


```
/fsapi/GET/netRemote.play.info.duration?pin=1337&sid=1431798833

<value><u32>0</u32></value>
```


### netRemote.play.rate
Method: GET

Returns the audio-rate for the track

```
/fsapi/GET/netRemote.play.rate?pin=1337&sid=635775977

<value><s8>0</s8></value>
```

### netRemote.play.signalStrength
Method: GET

Returns the signal strenght of the current medium


```
/fsapi/GET/netRemote.play.signalStrength?pin=1337&sid=1226842809

<value><u8>0</u8></value>
```

## Nav

### netRemote.nav.action.dabScan
Method: GET

Returns ??? 

```
/fsapi/GET/netRemote.nav.action.dabScan?pin=1337&sid=1983995656

<value><u8>0</u8></value>
```

### netRemote.nav.status
Method: GET, SET

Sets / Returns ???

```
<status>FS_NODE_BLOCKED</status>
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
FS_NODE_BLOCKED
```

### netRemote.nav.action.navigate
Method: GET, SET

Sets / Returns ???

```
FS_NODE_BLOCKED
```

### netRemote.nav.caps
Method: GET

Sets / Returns ???

```
/fsapi/GET/netRemote.nav.caps?pin=1337&sid=779967663

<value><u32>0</u32></value>

```

### netRemote.nav.state
Method: GET, SET

Sets / Returns ???


```
/fsapi/GET/netRemote.nav.state?pin=1337&sid=1974440588


<value><u8>0</u8></value>
```
