<?php

require_once("config.php");

class User {

    /* Methods
    */
    function __construct(){
    }

    public function find_all_users(){
        global $database;

        $result_set = $database->query("SELECT * FROM users");
        return $result_set;
    }




}

$user = new User;
$user->find_all_users();


?>