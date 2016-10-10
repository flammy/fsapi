<?php
interface Nodes
{
    /**
     * returns the full path of the node
     *
     */

    public function getPath();


    /**
     * returns the name of the input validation
     *
     */


    public function getValidationMethod();

    /**
     * returns the valid methods for this node
     *
     */



    public function getCallMethods();


    /**
     * returns if the node has notifications
     *
     */


    public function getNotification();
}
