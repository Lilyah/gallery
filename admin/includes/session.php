<?php

require_once("config.php");

class Session {

    /* Properties
    */
    private $signed_in = false; // Default value is false
    public $user_id;


    /* Methods
    */
    function __construct(){
        session_start();
        $this->check_the_login();
    }

    // Get method; Returns true or false
    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->user_id;
            $this->signed_in = true;
        }
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