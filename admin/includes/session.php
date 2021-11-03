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

    // Check if the session user_id is set
    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id']; // Assigning value to our object
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }


}

$session = new Session();

?>