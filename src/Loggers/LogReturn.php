<?php
class LogReturn extends Logger implements  Loggers
{
    public function log($level, $message, array $context = array()){
        return $this->addDate($message);
    }
}
