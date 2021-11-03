<?php

require_once("config.php");

class Session {

    /* Properties
    */
    private $signed_in;
    public $user_id;


    /* Methods
    */
    function __construct(){
        session_start();
    }


}

$session = new Session();

?>