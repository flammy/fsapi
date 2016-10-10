<?php
class LogStdOut extends Logger implements  Loggers
{
    public function log($level, $message, array $context = array()){
        file_put_contents('php://stdout', $this->addDate($message));
    }
}
