<?php
class LogEcho extends Logger implements  Loggers
{
    public function log($level, $message, array $context = array()){
        echo $this->addDate($message);
    }
}
