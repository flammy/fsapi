# FSAPI Documentation


The FSAPI is a simple HTTP-API.

You send a HTTP GET request an in return you will get XML.


## Nodes

Nodes are the hierarchical path to Object you want to receive or modify.

Example:

If you want to toggle mute or check if the device is muted you can access the node:

```
netRemote.sys.audio.mute
```

## Operations

Operations determine how you interact with the node.

#### SET

Sets the value of an node.

#### GET

Gets the value of an node.

#### LIST_GET_NEXT

Get the next "page" of a list stored in the node.

#### CREATE_SESSION

Login with pin an get a Session-ID in return.

#### DELETE_SESSION

Logout and destroy the Session-ID.

#### GET_NOTIFIES

This is a special Command: The device does not close the HTTP-Request.

With this command you can use the connection like a normal socket, where the device sends you updates about changed nodes.

This Command is only available if a Session-ID is used to authenticate.

It gives you a FS_TIMEOUT error if nothing has changed.

Examples:

```
GET:
/fsapi/GET/netRemote.sys.audio.mute?pin=1337&sid=1932538906

SET
/fsapi/SET/netRemote.sys.audio.mute?pin=1337&sid=1932538906&value=1


LIST_GET_NEXT
/fsapi/LIST_GET_NEXT/netRemote.nav.presets/-1?pin=1337&maxItems=10


```



## Status Codes

The first indicator for the success of your request is the HTTP-Statuscode, it should be 200 if everything is ok.

#### HTTP 200 OK

You request is valid: 

The path to the FSAPI is right and you provided the right PIN.

#### HTTP 404 Not Found

You get an 404 Status Code if your Session-ID is invalid or you requested a non-existing path.

#### HTTP 403 Forbidden

You get an 403 Statuscode if you sent an invalid PIN.


## Return Values

If your request is valid (HTTP Status 200 OK) the device returns allways an XML-set like this:

```
<fsapiResponse>
<status>STATUS</status>
VALUE
</fsapiResponse>
```

Where VALUE is the requested value and STATUS should be FS_OK if everything is fine with the request.

#### FS_OK

Everything went well: The command has been executed.

The new value is valid and within the range of the validation rules.

#### FS_FAIL

The command hasn't been executed, because your value does not match the validation rules.

#### FS_PACKET_BAD

You tried to set the value of an read only node.


#### FS_NODE_BLOCKED

You tried to SET a node of an operation Mode which is not active.


#### FS_NODE_DOES_NOT_EXIST

You tried to access an not existing node.

#### FS_TIMEOUT

Your Request took to long.


#### FS_LIST_END

There is no list-entry left.




## Session Handling

The device does only support one session at a time. If you create a new session the old session will be purged.

#### Session-ID

If you send only the Session-ID your new requests will fail, if a new session is created by another user.

The Session-ID is not only valid for the current command and can be reused for new commands.


#### Pin
If you send the pin in every request you can have multiple users, which can cause conflicts between their commands.




## Reference


To keep it simple I will only mention the VALUE field of the response.

- [Nav](#nav) - menu-navigation 
- [Play](#play) - settings for current playback
- [System](#system) - system settings
- [Platform](#platform) - platform updates
- [Misc](#misc) - debug and log settings
- [Test](#test) - iperf console
- [Spotify*](#spotify) - only for devices with spotify-support
- [Airplay*](#airplay) - only for devices with airplay-support
- [Multiroom*](#multiroom) - only for devices with multiroom-support

All topics except the menu are sorted in alphabetical order.

### Airplay

:exclamation: The following comands work only on devices with airplay-support :exclamation:


#### netRemote.airplay.clearPassword

Method: ??

Todo 

```

```

#### netRemote.airplay.setPassword

Method: ??

Todo 

```

```

### Multiroom

:exclamation: The following comands work only on devices with mutiroom-support :exclamation:

#### netRemote.multiroom.caps.maxClients

Method: ??

Todo 

```

```

#### netRemote.multiroom.caps.protocolVersion

Method: ??

Todo 

```

```

#### netRemote.multiroom.client.statusX

Method: ??

Todo 

```

```



#### netRemote.multiroom.device.listAll
Method: LIST_GET_NEXT

Shows other Mutiroom devices in the Network

```
/fsapi/LIST_GET_NEXT/netRemote.multiroom.device.listAll/-1?pin=1337&maxItems=10

<item key="0">
<field name="udn"><c8_array>46C19E4A-472B-11E1-9F67-002261ED0770</c8_array></field>
<field name="friendlyname"><c8_array>DeviceName</c8_array></field>
<field name="ipaddress"><c8_array>192.168.xxx.xxx</c8_array></field>
<field name="audiosyncversion"><c8_array>3</c8_array></field>
<field name="groupid"><c8_array>0AD57A8A-49A8-11E6-XXXX-002261EDXXXX</c8_array></field>
<field name="groupname"><c8_array>MultirooGroupName</c8_array></field>
<field name="grouprole"><u8>2</u8></field>
<field name="clientnumber"><u8>254</u8></field>
</item>

<listend/>

```

#### netRemote.multiroom.device.listAllVersion

TODO

Method: ??

??? 

```

```


#### netRemote.multiroom.device.serverStatus

TODO

Method: GET

???


```
/fsapi/GET/netRemote.multiroom.device.serverStatus?pin=1337

<value><u8>1</u8></value>

```

#### netRemote.multiroom.device.clientStatus


#### netRemote.multiroom.device.clientIndex

TODO

Method: GET

???

```
/fsapi/GET/netRemote.multiroom.device.clientIndex?pin=1337

<value><u8>0</u8></value>

```


#### netRemote.multiroom.device.transportOptimisation

TODO

Method: GET

???

```
/fsapi/GET/netRemote.multiroom.device.transportOptimisation?pin=1337

<status>FS_NODE_DOES_NOT_EXIST</status>

```


#### netRemote.multiroom.group.becomeServer

TODO

Method: ??

??? 

```

```

#### netRemote.multiroom.group.removeClient

TODO

Method: ??

??? 

```

```

#### netRemote.multiroom.group.streamable
TODO

Method: GET

???

```
/fsapi/GET/netRemote.multiroom.group.streamable?pin=1337

<value><u8>1</u8></value>

```

#### netRemote.multiroom.group.create
Method: SET

Create new group

```
/fsapi/SET/netRemote.multiroom.group.create?pin=1337&value=GroupName

<status>FS_NODE_DOES_NOT_EXIST</status>

```


#### netRemote.multiroom.group.addClient
Method: SET

Add device to group

```
/fsapi/SET/netRemote.multiroom.group.group.addClient?pin=1337&value=[Device-udn]

<status>FS_NODE_DOES_NOT_EXIST</status>

```

#### netRemote.multiroom.group.attachedClients

TODO

Method: ??

??? 

```

```


#### netRemote.multiroom.group.destroy
Method: SET

Delete Multiroom group

```
/fsapi/SET/netRemote.multiroom.group.group.destroy?pin=1337&value=1

<status>FS_NODE_DOES_NOT_EXIST</status>

```


#### netRemote.multiroom.group.name
Method: GET

Get Mutiroom Group Name

```
/fsapi/GET/netRemote.multiroom.group.name?pin=1337

<value><c8_array>1234</c8_array></value>

```

#### netRemote.multiroom.group.id
TODO

Method: GET

???

```
/fsapi/GET/netRemote.multiroom.group.id?pin=1337

<value><c8_array>501867A4-42A7-11E6-XXXX-002261E7XXXX</c8_array></value>

```

#### netRemote.multiroom.group.state
Method: GET, SET

0 = No Group, (1 = Client), 2 = Server

```
/fsapi/GET/netRemote.multiroom.group.state?pin=1337

<value><u8>2</u8></value>

```


#### netRemote.multiroom.client.volumeX
Method: GET, SET

Set/Get Volume for device No X (0,1,2,...)

```
/fsapi/GET/netRemote.multiroom.client.volume0?pin=1337&value=12

<value><u8>20</u8></value>

```

#### netRemote.multiroom.client.muteX
Method: GET, SET

Set/Get MuteState for device No X (0,1,2,...)

```
/fsapi/GET/netRemote.multiroom.client.mute?pin=1337&value=1

<value><u8>0</u8></value>

```


#### netRemote.multiroom.group.masterVolume
Method: GET, SET

Set/Get Volume for all devices

```
/fsapi/GET/netRemote.multiroom.group.masterVolume?pin=1337&value=12

<value><u8>12</u8></value>

```

### Misc

#### netRemote.misc.fsDebug.component
TODO

Method: ??

??? 

```

```
#### netRemote.misc.fsDebug.traceLevel
TODO

Method: ??

??? 

```

```


### Nav 

Every change of the system mode, will disable the nav state to reset the current menu-position. It has to be activated with nav.state


#### netRemote.nav.action.dabPrune

TODO

Method: ??

??? 

```

```

#### netRemote.nav.action.dabScan

TODO

Starts Scan for DAB Channels

Method: GET

Returns ??? 

```
/fsapi/GET/netRemote.nav.action.dabScan?pin=1337&sid=1983995656

<value><u8>0</u8></value>
```

#### netRemote.nav.action.navigate

Selects the current menu entry (see netRemote.nav.list)

This function works only with folders (type=0)

Method: SET


```
/fsapi/SET/netRemote.nav.action.navigate?pin=1337&value=0

```

#### netRemote.nav.action.selectItem

Selects an Menu Item (see netRemove.nav.list)

This function works only on files (type > 0)

Method: SET

```
fsapi/SET/netRemote.nav.action.selectItem?pin=1337&value=7
```
#### netRemote.nav.action.selectPreset

Selects a  favorite Radio Stations (see netRemote.nav.presets)

Method: GET/SET

```
/fsapi/SET/netRemote.nav.action.selectPreset?pin=1337&value=0

```


#### netRemote.nav.caps

TODO

Method: GET

Sets / Returns ???

```
/fsapi/GET/netRemote.nav.caps?pin=1337&sid=779967663

<value><u32>3</u32></value>

```
#### netRemote.nav.browseMode

TODO

Method: ??

??? 

```

```


#### netRemote.nav.dabScanUpdate

TODO

Method: ??

??? 

```

```

#### netRemote.nav.errorStr

TODO

Method: ??

??? 

```

```

#### netRemote.nav.list

Get the menu for the current mode 

To prevent overhead you could get the number of items by netRemote.nav.numItems

The -1 Parameter is the Start-Value, you could provide 4 to get all items with an index greater 4.


Method: LIST_GET_NEXT


```
fsapi/LIST_GET_NEXT/netRemote.nav.list/-1?pin=1337&maxItems=10

        <itemkey="0">
            <fieldname="name">
                <c8_array>Meine Favoriten</c8_array>
                </field>
            <fieldname="type">
                <u8>0</u8>
                </field>
            <field name="subtype">
                <u8>0</u8>
                </field>
        </item>
       <item key="1">
            <field name="name">
                <c8_array>Lokal Deutschland</c8_array>
                </field>
            <field name="type">
                <u8>0</u8>
            </field>
            <fieldname="subtype">
                <u8>0</u8>
            </field>
        </item>
```
           
#### netRemote.nav.numItems

Method: GET

Get the amount of entries for the current navigation-set.


```
/fsapi/GET/netRemote.nav.numItems?pin=1337&sid=973104948


<value><s32>21</s32></value>
```


#### netRemote.nav.presets

Method: LIST_GET_NEXT

Lists all favorite Radio Stations for the current mode

```
/fsapi/LIST_GET_NEXT/netRemote.nav.presets/-1?pin=1337&maxItems=10

        <item key="0">
            <field name="name">
            <c8_array>1LIVE</c8_array>
        </field>
        <item key="1">
            <field name="name">
            <c8_array>Deutschlandfunk 91.3</c8_array>
        </field>

```

#### netRemote.nav.searchTerm

Search in the current navigation (see netRemote.nav.list)


```
/fsapi/SET/netRemote.nav.searchTerm?pin=1337&value=testsuche

```



#### netRemote.nav.state

Enables the navigation in the menu (see nav.list)

Every change of the system mode, will disable the nav state to reset the current menu-position.


Method: GET, SET

Sets / Returns the status of the navigation. 


```
/fsapi/GET/netRemote.nav.state?pin=1337&sid=1974440588


<value><u8>1</u8></value>

```

#### netRemote.nav.status

While the device prepares the menu this node is set to 0, if the menu is ready it is set to 1.

Busy menus are caused by mode-change or nav.action.navigate

Method: GET

Returns the navigation status

```
/fsapi/GET/netRemote.nav.status?pin=1337

<value><u8>0</u8></value>
```

#### netRemote.nav.depth

Method: GET

Returns the current navigation menu depth

```
/fsapi/GET/netRemote.nav.depth?pin=1337

<value><u8>0</u8></value>
```


### Platform

#### netRemote.platform.softApUpdate.updateModeStatus

TODO

Method: ??

??? 

```

```
#### netRemote.platform.softApUpdate.updateModeRequest

TODO

Method: ??

??? 

```

```

### Play

#### netRemote.play.addPreset

Method: SET


Add the current radio stations to the favorites menu

```
/fsapi/SET/netRemote.play.addPreset?pin=1337&value=5
```


#### netRemote.play.addPresetStatus

TODO

Method: ??

??? 

```

```


#### netRemote.play.caps

TODO

Method: GET

Returns ???

```
/fsapi/GET/netRemote.play.caps?pin=1337&sid=1672745554


empty: <value><u32>0</u32></value>

1LIVE diGGi: <value><u32>2060</u32></value>

```

#### netRemote.play.control

Method: GET, SET

Scope: Mediaplayer / Radio

Sets / Return the current play-controll mode

1=Play; 2=Pause; 3=Next (song/station); 4=Previous (song/station)


```
/fsapi/GET/netRemote.play.control?pin=1337&sid=1737628193

<value><u8>0</u8></value>
```

#### netRemote.play.errorStr

Method: GET
```
/fsapi/GET/netRemote.play.errorStr?pin=1337

<value><c8_array></c8_array></value>
```

#### netRemote.play.feedback

TODO

Method: ??

??? 

```

```

#### netRemote.play.frequency
Method: GET, SET

Sets / Returns the current frequency for fm (in herz)

```
/fsapi/GET/netRemote.play.frequency?pin=1337&sid=615989613

<value><u32>96700</u32></value>

96700 = 96,70 MHz
```

#### netRemote.play.info.album
Method: GET

Returns  the name of the album of the current song

```
/fsapi/GET/netRemote.play.info.album?pin=1337&sid=23681281


<value><c8_array></c8_array></value>
```

#### netRemote.play.info.artist
Method: GET

Returns  the name of the artist of the current song

```
/fsapi/GET/netRemote.play.info.artist?pin=1337&sid=1303639071

<value><c8_array></c8_array></value>
```

#### netRemote.play.info.duration
Method: GET

Returns the duration for the track in milliseconds


```
/fsapi/GET/netRemote.play.info.duration?pin=1337&sid=1431798833

<value><u32>0</u32></value>
```


#### netRemote.play.info.graphicUri
Method: GET

Returns  the uri of an image representing the current song / station

```
/fsapi/GET/netRemote.play.info.graphicUri?pin=1337&sid=1566925260

empty: <value><c8_array></c8_array></value>
1LIVE Online: <value><c8_array>http://aldi.wifiradiofrontier.com/setupapp/setup1/logo/logo-531.png</c8_array></value>
```

#### netRemote.play.info.name
Method: GET

Returns  the first line of the display

```
/fsapi/GET/netRemote.play.info.name?pin=1337&sid=548290233

empty: <value><c8_array></c8_array></value>

1LIVE diGGi: <value><c8_array>1LIVE diGGi     </c8_array></value>
```

#### netRemote.play.info.text
Method: GET

Returns  the second line of the display

```
/fsapi/GET/netRemote.play.info.text?pin=1337&sid=429343323

empty: <value><c8_array></c8_array></value>

1LIVE diGGi: <value><c8_array>Infos und Playlist auch im Netz: 1livediggi.de</c8_array></value>

```

#### netRemote.play.position
Method: GET, SET

Sets / Returns the current position in the track in milliseconds

Keep in mind to get the max position by netRemote.play.info.duration.


```
/fsapi/GET/netRemote.play.position?pin=1337&sid=984827477

<value><u32>0</u32></value>
```

#### netRemote.play.rate
Method: GET, SET

Sets / Returns the current play-rate multiplier

The value determines the speed of the playback. It can be in the range of -127 to 127 where the negative part plays the current track backwards.

```
/fsapi/GET/netRemote.play.rate?pin=1337&sid=635775977

<value><s8>0</s8></value>
```

#### netRemote.play.repeat
Method: GET, SET

Scope: Music Player


Sets / Returns  whether or not repeat is enabled or not

```
/fsapi/GET/netRemote.play.repeat?pin=1337&sid=506326863


<value><u8>0</u8></value>
```

#### netRemote.play.scrobble
Method: GET

Returns  whether or not scrobble is enabled or not

```
/fsapi/GET/netRemote.play.scrobble?pin=1337&sid=1961792010


<value><u8>0</u8></value>
```
#### netRemote.play.serviceIds.dabEnsembleId
Method: GET

Returns DAB Ensemble Identifier (decimal notation)
Note: commonly used in Hex notation.  In this example that would be "C1CE" i.e. the UK's "SDL National" multiplex

```
/fsapi/GET/netRemote.play.serviceIds.dabEnsembleId?pin=1337

<value><u16>49614</u16></value>

```

#### netRemote.play.serviceIds.dabScids
Method: GET

Returns the DAB Service Component Identifier (decimal notation)
Note: Nearly always 0 for audio services - Secondary Component services will have a different value - e.g. when tuned to "<<BBC R5LiveSportX"

```
/fsapi/GET/netRemote.play.serviceIds.dabScids?pin=1337

<value><u8>0</u8></value>

```

#### netRemote.play.serviceIds.dabServiceId
Method: GET

Returns DAB Service Identifier (decimal notation)
Note: commonly used in Hex notation.  In this example that would be "CED7" i.e. the UK's "Magic Chilled" service

```
/fsapi/GET/netRemote.play.serviceIds.dabServiceId?pin=1337

<value><u32>52951</u32></value>

```

#### netRemote.play.serviceIds.ecc
Method: GET

Returns Extended Country Code (decimal notation) as defined in ETSI TS 101 756
Note: commonly used in Hex notation.  Defined in ETSI TS 101 756, used in conjunction with the first character (in Hex notation) of the dabServiceId to identify the country.
e.g. 
dabServiceId 52951 (CED7); ecc 225 (E1); Global Country Code of CE1 = United Kingdom
dabServiceId 57233 (DF91); ecc 224 (E0); gives a Global Country Code of DE0 = Germany

```
/fsapi/GET/netRemote.play.serviceIds.ecc?pin=1337

<value><u8>225</u8></value>

```

#### netRemote.play.serviceIds.fmRdsPi

TODO : Confirm if this works on other radios

Method: GET

Returns RDS Programme Identification code (or rather should, the Roberts Stream 93i Returns 0 for all services)

```
/fsapi/GET/netRemote.play.serviceIds.fmRdsPi?pin=1337


<value><u16>0</u16></value>
```


#### netRemote.play.shuffle
Method: GET, SET

Scope: Music-Player

Sets / Returns whether or not shuffle is enabled or not (1/0)

```
/fsapi/GET/netRemote.play.shuffle?pin=1337&sid=1843354907

<value><u8>0</u8></value>

```

#### netRemote.play.shuffleStatus

TODO

Method: GET, SET

Is part of the new api version

```
/fsapi/GET/netRemote.play.shuffleStatus?pin=1337&sid=1843354907

FS_NODE_DOES_NOT_EXIST

```




#### netRemote.play.signalStrength
Method: GET

Returns the signal strenght of the current medium


```
/fsapi/GET/netRemote.play.signalStrength?pin=1337&sid=1226842809

<value><u8>0</u8></value>
```

#### netRemote.play.status
Method: GET

Returns status of the player

1=buffering/loading, 2=playing, 3=paused

```
/fsapi/GET/netRemote.play.status?pin=1337&sid=973104948


<value><u8>0</u8></value>
```

### Spotify


:exclamation: The following comands work only on devices with spotify-support :exclamation:

#### netRemote.spotify.username
TODO

Method: ??

??? 

```

```
#### netRemote.spotify.lastError
TODO

Method: ??

??? 

```

```
#### netRemote.spotify.status
TODO

Method: ??

??? 

```

```
#### netRemote.spotify.bitRate
TODO

Method: ??

??? 

```

```


### System


#### netRemote.sys.alarm.duration

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.current

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.config

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.configChanged

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.status

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.snooze

TODO

Method: ??

??? 

```

```

#### netRemote.sys.alarm.snoozing

TODO

Method: ??

??? 

```

```


#### netRemote.sys.audio.eqCustom.param

TODO

Method: ??

??? 

```

```

#### netRemote.sys.audio.eqCustom.param0
Method: GET, SET

Sets / Returns the first value for costum eq-settings (Bass)

Range: -7 to 7

```
/fsapi/GET/netRemote.sys.audio.eqCustom.param0?pin=1337&sid=1789657498

<value><s16>1</s16></value>
```

#### netRemote.sys.audio.eqCustom.param1
Method: GET, SET

Sets / Returns the second value for costum eq-settings (Treble)

Range: -7 to 7


```
/fsapi/GET/netRemote.sys.audio.eqCustom.param1?pin=1337&sid=1636927329

<value><s16>1</s16></value>
```

#### netRemote.sys.audio.eqCustom.param2

TODO

Method: ??

??? 

```

```

#### netRemote.sys.audio.eqCustom.param3

TODO

Method: ??

??? 

```

```

#### netRemote.sys.audio.eqCustom.param4

TODO

Method: ??

??? 

```

```

#### netRemote.sys.audio.eqLoudness
Method: GET, SET

Sets / Returns whether or not loudness is activated

This function is only available if costum eq is active

```
/fsapi/GET/netRemote.sys.audio.eqLoudness?pin=1337&sid=1033306501

<value><u8>0</u8></value>
```


#### netRemote.sys.audio.eqPreset
Method: GET, SET

Sets / Returns the number of the selected eq-presets

see: netRemote.sys.caps.eqPresets for valid presets.


```
/fsapi/GET/netRemote.sys.audio.eqPreset?pin=1337&sid=643480027

<value><u8>5</u8></value>
```

#### netRemote.sys.audio.extStaticDelay

TODO

Method: ??

??? 

```

```


#### netRemote.sys.audio.mute
Method: GET, SET

Sets / Returns whether or not device is muted

```
/fsapi/GET/netRemote.sys.audio.mute?pin=1337&sid=1932538906

<value><u8>0</u8></value>
```

#### netRemote.sys.audio.volume
Method: GET, SET

Sets / Returns the volume of the device (Range: 1-20)

```
/fsapi/GET/netRemote.sys.audio.volume?pin=1337&sid=218069529

<value><u8>4</u8></value>
```

#### netRemote.sys.caps.clockSourceList

TODO

Method: ??

??? 

```

```


#### netRemote.sys.caps.dabFreqList

TODO

Method: LIST_GET_NEXT

Lists available dab-frequencies  

```
    /fsapi/LIST_GET_NEXT/netRemote.sys.caps.dabFreqList/-1?pin=1337&maxItems=65536

      <item key="0">
            <fieldname="freq">
                <u32>174928</u32>
                </field>
            <fieldname="label">
                <c8_array>5A</c8_array>
            </field>
        </item>
      <item key="1">
            <fieldname="freq">
                <u32>176640</u32>
                </field>
            <fieldname="label">
                <c8_array>5B</c8_array>
            </field>
        </item>
```

#### netRemote.sys.caps.eqBands
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

#### netRemote.sys.caps.eqPresets
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

#### netRemote.sys.caps.extStaticDelayMax

TODO

Method: ??

??? 

```

```


#### netRemote.sys.caps.fmFreqRange.lower
Method: GET

Returns the lowest available fm-frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.lower?pin=1337&sid=1005285685

<value><u32>87500</u32></value>
```

#### netRemote.sys.caps.fmFreqRange.stepSize
Method: GET

Returns the size of the steps for increasing / decreasing the frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.stepSize?pin=1337&sid=1369641108

<value><u32>50</u32></value>
```

#### netRemote.sys.caps.fmFreqRange.upper
Method: GET

Returns the highest available fm-frequency

```
/fsapi/GET/netRemote.sys.caps.fmFreqRange.upper?pin=1337&sid=1771149341

<value><u32>108000</u32></value>
```

#### netRemote.sys.caps.utcSettingsList

TODO

Method: ??

??? 

```

```


#### netRemote.sys.caps.validLang

TODO

Method: ??

??? 

```

```

#### netRemote.sys.caps.validModes
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


#### netRemote.sys.caps.volumeSteps
Method: GET

Returns the max volume level

```
/fsapi/GET/netRemote.sys.caps.volumeSteps?pin=1337&sid=896363579

<value><u8>21</u8></value>
```


#### netRemote.sys.clock.dateFormat

TODO

Method: ??

??? 

```

```

#### netRemote.sys.clock.dst

TODO

Method: ??

??? 

```

```

#### netRemote.sys.clock.localDate
Method: GET

Returns the local Date in XML-RPC date format ( 20150914 = 2015-09-14)

```
/fsapi/GET/netRemote.sys.clock.localDate?pin=1337&sid=1947840669

<value><c8_array>20150914</c8_array></value>
```


#### netRemote.sys.clock.localTime
Method: GET

Returns the local time in XML-RPC date format ( 093327 = 09:33:27)

```
/fsapi/GET/netRemote.sys.clock.localTime?pin=1337&sid=1947840669

<value><c8_array>093327</c8_array></value>
```

#### netRemote.sys.clock.mode

TODO

Method: ??

??? 

```

```

#### netRemote.sys.clock.source

TODO

Method: ??

??? 

```

```

#### netRemote.sys.clock.utcOffset

TODO

Method: ??

??? 

```

```


#### netRemote.sys.cfg.irAutoPlayFlag

TODO

Method GET,SET

Is part of the new API Version.

```
/fsapi/SET/netRemote.sys.cfg.irAutoPlayFlag?pin=1337&value=0

<value><u8>0</u8></value>

```


#### netRemote.sys.factoryReset

TODO

Method: ??

??? 

```

```


#### netRemote.sys.info.activeSession

TODO

Method: ??

??? 

```

```

#### netRemote.sys.info.dmruuid

TODO

Method: ??

??? 

```

```

#### netRemote.sys.info.friendlyName
Method: GET, SET

Sets/ Returns the Network-Name of the Device

```
/fsapi/GET/netRemote.sys.info.friendlyName?pin=1337&sid=1947840669

<value><c8_array>Radio</c8_array></value>
```

#### netRemote.sys.info.radioId
Method: GET

Returns uniquie? ID Radio-ID 

```
/fsapi/GET/netRemote.sys.info.radioId?pin=1337&sid=1720678490

<value><c8_array>001122AABBCC</c8_array></value>

```
#### netRemote.sys.info.radioPin
Method: GET, SET

```
fsapi/SET/netRemote.sys.info.radioPin?pin=1337&value=1337
```



#### netRemote.sys.info.version
Method: GET

Returns Image-Version String


```
/fsapi/GET/netRemote.sys.info.version?pin=1337&sid=1784185740

<value><c8_array>ir-mmi-FS2026-0500-0036_V2.5.15.EX51267-4RC2</c8_array></value>
```


#### netRemote.sys.info.controllerName
Method: GET, SET

Get or Set the Name of the Device which is remote-controling the radio

```
/fsapi/GET/netRemote.sys.info.controllerName?pin=1337

<value><c8_array>Nexus 7</c8_array></value>
```



#### netRemote.sys.isu.control

2 = search for updates


Method GET,SET

```
/fsapi/SET/netRemote.sys.isu.control?pin=1337&value=2
```

#### netRemote.sys.isu.mandatory

TODO

Method: ??

??? 

```

```

#### netRemote.sys.isu.softwareUpdateProgress

TODO

Method: ??

??? 

```

```


#### netRemote.sys.isu.state

Shows the update process, default 0

while searching 1

after searching: 0



Method GET

```
/fsapi/GET/netRemote.sys.isu.state?pin=1337

<value><u8>1</u8></value>
```

#### netRemote.sys.isu.summary

TODO

Method: ??

??? 

```

```


#### netRemote.sys.isu.version

TODO

Method: ??

??? 

```

```

#### netRemote.sys.lang

TODO

Method: GET

Returns ???

```
/fsapi/GET/netRemote.sys.lang?pin=1337&sid=539517630

<value><u32>0</u32></value>
```

#### netRemote.sys.mode
Method: GET, SET

Sets / Returns the current operation mode 

see netRemote.sys.caps.validModes for valid operation modes

```
/fsapi/GET/netRemote.sys.mode?pin=1337&sid=300029608

<value><u32>4294967295</u32></value>
```

#### netRemote.sys.net.commitChanges

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.ipConfig.address
Method: GET

Returns the IP address for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.address?pin=1337&sid=1178490789


<value><u32>3232235576</u32></value>
```

#### netRemote.sys.net.ipConfig.dhcp
Method: GET

Returns if DHCP is enabled for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dhcp?pin=1337&sid=208317414

<value><u8>1</u8></value>
```

#### netRemote.sys.net.ipConfig.dnsPrimary
Method: GET

Returns the primary dns for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dnsPrimary?pin=1337&sid=1796481137

<value><u32>3232235521</u32></value>
```

#### netRemote.sys.net.ipConfig.dnsSecondary
Method: GET

Returns the secondary dns for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.dnsSecondary?pin=1337&sid=1171925458

<value><u32>0</u32></value>
```

#### netRemote.sys.net.ipConfig.gateway
Method: GET

Returns the default gateway for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.gateway?pin=1337&sid=1545150372


<value><u32>3232235521</u32></value>
```

#### netRemote.sys.net.ipConfig.subnetMask
Method: GET

Returns the subnet mask for the connected network

```
/fsapi/GET/netRemote.sys.net.ipConfig.subnetMask?pin=1337&sid=1852331719

<value><u32>4294967040</u32></value>
```
#### netRemote.sys.net.keepConnected

Method GET, SET

If set to 1 network connection is not disconnected in standby

```
/fsapi/SET/netRemote.sys.net.keepConnected?pin=1337&value=1

```


#### netRemote.sys.net.wired.interfaceEnable
Method: GET

Returns the NIC Status of the Ethernet Device

```
/fsapi/GET/netRemote.sys.net.wired.interfaceEnable?pin=1337&sid=441427276
<value><u8>1</u8></value>
```

#### netRemote.sys.net.wired.macAddress
Method: GET

Returns the MAC Address of the Ethernet Device

```
/fsapi/GET/netRemote.sys.net.wired.macAddress?pin=1337&sid=636641042

<value><c8_array>00:11:22:33:44:FF</c8_array></value>
```

#### netRemote.sys.net.wlan.connectedSSID
Method: GET

Returns the SSID of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.connectedSSID?pin=1337&sid=829201793

Example
```

#### netRemote.sys.net.wlan.interfaceEnable
Method: GET

Returns the NIC Status of the WIFI Device

```
/fsapi/GET/netRemote.sys.net.wlan.interfaceEnable?pin=1337&sid=1390762771

<value><u8>0</u8></value>
```

#### netRemote.sys.net.wlan.macAddress
Method: GET

Returns the MAC Address of the WIFI Device

```
/fsapi/GET/netRemote.sys.net.wlan.macAddress?pin=1337&sid=32327402

<value><c8_array>00:11:22:33:44:FF</c8_array></value>
```

#### netRemote.sys.net.wlan.performFCC

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.performWPS

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.region

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.regionFcc

TODO

Method: ??

??? 

```

```


#### netRemote.sys.net.wlan.rssi
Method: GET

Returns the Signal Strenght of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.rssi?pin=1337&sid=1681224474
<value><u8>100</u8></value>
```

#### netRemote.sys.net.wlan.scan

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.scanList

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.selectAP

TODO

Method: ??

??? 

```

```



#### netRemote.sys.net.wlan.setAuthType

TODO

Method: GET

Returns the ??? of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.setAuthType?pin=1337&sid=924278502

Example...
```



#### netRemote.sys.net.wlan.setEncType
Method: GET

Returns the Encryption Type of the connected WIFI network

```
/fsapi/GET/netRemote.sys.net.wlan.setEncType?pin=1337&sid=1860534785

Example...
```



#### netRemote.sys.net.wlan.setFccTestChanNum

TODO

Method: ??

??? 

```

```



#### netRemote.sys.net.wlan.setFccTestDataRate

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.setFccTestTxDataPattern

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.setFccTestTxPower

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.setFccTxOff

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.setPassphrase

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.setSSID

TODO

Method: ??

??? 

```

```

#### netRemote.sys.net.wlan.wpsPinRead

TODO

Method: ??

??? 

```

```

#### netRemote.sys.power
Method: GET, SET

Sets / Returns the current power state

If device returns from standby it will only auto-continue to play in radio-modes.

```
/fsapi/GET/netRemote.sys.power?pin=1337&sid=150145723

<value><u8>0</u8></value>
```

#### netRemote.sys.sleep
Method: GET, SET

Sets / Returns the Time till Sleep in seconds (0 = No Sleep) [works with Firmware V2.9.10 but not with V2.6.17]
```
/fsapi/GET/netRemote.sys.sleep?pin=1337

<value><u32>97</u32></value>
```

#### netRemote.sys.state


#### netRemote.sys.rsa.publicKey

TODO

Method: ??

??? 

```

```

#### netRemote.sys.rsa.status

is part of the new api version

#### netRemote.sys.ipod.dockStatus

TODO

Method: ??

??? 

```

```


### Test

#### netRemote.test.iperf.console
TODO

Method: ??

??? 

```

```
#### netRemote.test.iperf.commandLine
TODO

Method: ??

??? 

```

```
#### netRemote.test.iperf.execute
TODO

Method: ??

??? 

```

```