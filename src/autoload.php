<?php
function autoloader($class)
{
    $filename = $class . '.php';
    
    
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Nodes".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Validators".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Parsers".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Loggers".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Exceptions".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR."Interfaces".DIRECTORY_SEPARATOR;
    if (file_exists($path.$filename)) {
        include($path.$filename);
    }
}
spl_autoload_register('autoloader');
