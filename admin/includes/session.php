<?php

require_once("config.php");

class Session {

    /* Properties
    */
    private $signed_in = false; // Default value is false
    public $user_id;
    public $message;


    /* Methods
    */
    function __construct(){
        session_start();
        $this->check_the_login();
        $this->check_message();
    }

    // Method for displaying messages
    public function message($msg=""){
        return !empty($msg) ? $_SESSION['message'] = $msg : $this->message;
    }

    // If we refresh the page the message will be gone
    private function check_message(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    // Get method; Returns true or false
    public function is_signed_in(){
        return $this->signed_in;
    }

    // Login method
    public function login($user){
        if($user){
            // Explained from right to lef: First we take the id from the $user then we store it inside $_SESSION['user_id'] and then finally w assign in to the current instance with the $this->user_id
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

    // Logout method
    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }


}

$session = new Session();

?>