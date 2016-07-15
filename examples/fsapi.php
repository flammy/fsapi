<?php
function __autoload($class_name) {
    include dirname(__file__).'/../src/'.$class_name . '.php';
}

	/**
  	* Credentials
  	*/

	// create object from fsapi
	$fsapi = new fsapi();
	// set the pin for the device
	$fsapi->setpin(1337);
	// set the hostname for the device
	$fsapi->sethost('192.168.0.111');
	//  open a new session
	$response = $fsapi->call('CREATE_SESSION');
	// and save it to the the object
	if($response[0] !== false){
		$fsapi->setsid($response[1]);
	}

	/**
  	* Internal lists
  	*/

	// get all known nodes and the allowed methods
	$result = $fsapi->getrw();
	// get all validation rules for known nodes
	$result = $fsapi->getvalidation();


	/**
  	* First interaction
  	* 
  	* See https://github.com/flammy/fsapi/blob/master/FSAPI.md for a detailed api documentation for the fsapi
  	*/

	// get the value from the node 
	$result = $fsapi->call('GET','netRemote.sys.audio.mute');

	// sets the value of the node
	$result = $fsapi->call('SET','netRemote.sys.audio.mute',array('value' => true));

	// gets a list of valid radio modes from the radio
	$result = $fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.validModes',array('maxItems' => 100), -1);



	/**
  	* Results
    *
    * The result is allways an array:
    * The first element of the array is a bool representing the success executing the function
    * The second element is either a string with the error message or an mixed result if the execution was successful
    *
    * array (false, 'error message')
    *
    * array (true, 'result ')
    * 
  	*/



	/**
  	* Logging
  	*/

	// set the logger to log to stdout
	$fsapi->setlogtarget('STDOUT');
	// set the level at which the log is written to the log target (STDOUT)
	$fsapi->setloglevel(2);
	// log START to log target (STDOUT)
	$fsapi->ioLogger('START',2);
	// dont log the array to log target (STDOUT) because loglevel is to high
	$fsapi->ioLogger(array('aa'=>'bb','cc' => 'dd'),3);
	// log the last result to log target (STDOUT) 
	$fsapi->ioLogger($result ,3);


	/**
  	* Test new Nodes
  	*/

  	// disable check for known nodes
  	$fsapi->setrw(null);
  	// to test new nodes 
  	$result = $fsapi->call('GET','netRemote.multiroom.group.name');
	// log the last result to log target (STDOUT) 
	$fsapi->ioLogger($result ,3);


?>
