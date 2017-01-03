# Radio Class

## Basic usage

```php
$Radio = new Radio($host,$pin);
```

### Node Values

Get the value of an node
```php
$Radio->GetSet('netRemote.nav.state');
```

Set the value of an node
```php
$Radio->GetSet('netRemote.nav.state',1);
```

### Node Lists

Get all list entries

```php
$Radio->GetSetList('netRemote.nav.presets');
```

Select a list entry

```php
$Radio->GetSetList('netRemote.nav.presets',1);
```

## Simple usage

### Toggle

Toggle the state of an node 

```php
$Radio->toggle('netRemote.nav.state');
```

### Volume

Set the devices volume to 5

```php
$Radio->volume(5);
```

Increase the volume

```php
$Radio->volume('up');
```

Decrease the volume

```php
$Radio->volume('down');
```

### Radio

Tune the radio frequency in mhz 

```php
$Radio->radioFrequency(106.4);
```

### Switches

switches can have the arguments 'toggle', 'on' or 'off'

toggle the power state of the device

```php
$Radio->power('toggle');
```
sets the power state of the device to on

```php
$Radio->power('on');
```
sets the power state of the device to off

```php
$Radio->power('off');
```

The following switches are implemented

```php
$Radio->power($value); // sets  / toglles the power state
$Radio->mute($value); // sets / toggles the mute state
$Radio->shuffle($value); // sets / toggles the shuffle state
```

### Lists

Lists have a setter and a getter method.


List all modes known on the device

```php
$Radio->listModes();
```

Select the mode 2 from the above list

```php
$Radio->selectMode(2);
```


For some lists it is necessary to activate the navigation:

```php
$Radio->setNavState(1);
```

You can count the available navigation items with:

```php
$Radio->numItems();
```

The following Lists are implemented

```php
$Radio->listModes(); // List all modes
$Radio->selectMode($value); // Select list entry from modes list

$Radio->listEqs(); // List all equalizers
$Radio->selectEq($value); // Select list entry from equalizer list

$Radio->listFavs(); // List all favorites
$Radio->selectFav($value); // Select list entry from favorites list

$Radio->listNavs(); // List all navigation items
$Radio->selectNav($value); // Select list entry from navigation list

```

The following Lists are implemented and can not be set

```php
$Radio->listDabFreqs(); // List all fab frequencies

$Radio->listEqBands(); // List all equalizer bands
```

### Controls

Controls determines the state of the radio

```php
$Radio->control('stop');
$Radio->control('play');
$Radio->control('pause');
$Radio->control('next');
$Radio->control('previous');
```

# SSDP Class

## Basic usage

To create an SSDP object you have to create a Scanner object first. This is to be able to mock the scanner result for unit-tests.

```php
$Scanner = new Scanner();
$SSDP = new SSDP($Scanner);
```

Now you can perform an SSDP Scan on the given sheme.

```php
$response = $SSDP->doScan('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');
```

# FSAPI Class

To create an FSAPI object you have to create a Request object first. This is to be able to mock the response from the device for unit-tests.

```php
$Request = new Request($host,$session_id,$pin);
$FSAPI = new FSAPI($Request);
```

Now you can send requests to the device to get a session-id

```php
$response = $FSAPI->doRequest('CREATE_SESSION');
$Request->setSID($response);
```

or get a nodes value:

```php
$response = $FSAPI->doRequest('GET',$node);
```

or set a nodes value:
```php
$response = $FSAPI->doRequest('SET',$node,array('value' => $value));
```

or get list entries

```php
$response = $FSAPI->doRequest('LIST_GET_NEXT',$node,array('maxItems' => 100), -1);
```


## Advanced usage

### List Setters

Lists have a special node to select an list entry. To avoid hardcoding this, the node object knows its setter node.

```php
$NodesFactory = new NodesFactory();
$Node = $NodesFactory->getNodeByName($node);
$Setter = $Node->getSetter();
$response = $FSAPI->doRequest('LIST_GET_NEXT',$Setter,array('maxItems' => 100), -1);
```

In some lists there is a setter based on the entry type. In this case the node knows a Setter for each type-index, which is provided in the list answer

```php
$response = $FSAPI->doRequest('LIST_GET_NEXT',$node,array('maxItems' => 100), -1);
```

The simplified result will look like this

```php
array(0 => array('type' => 1));
```

which leads to 

```php
$value = 0;
$item_type = 1;
```
which can be used to determine the right setter and set the value

```php
$NodesFactory = new NodesFactory();
$Node = $NodesFactory->getNodeByName($node);
$Setter = $Node->getSetter($item_type);
$response = $FSAPI->doRequest('SET',$Setter,array('value' => $value));
```

### Converters

Converters are used to translate the output and input values from and to a human radable format.
This is done with a static translation table in the node definition.

```php
$Converter = $Node->getConverter();
$value = $Converter->convertInput($value);
```

```php
$Converter = $Node->getConverter();
$value = $Converter->convertOutput($value);
```

In some cases you want to control this behavior from the outside of the node.

```php
$Converter = $Node->getConverter();
$Converter->setTranslationTable(array(0 => 'zero', 1 => 'one'));
$value = $Converter->convertOutput($value);
```


