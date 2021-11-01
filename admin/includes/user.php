<?php

require_once("config.php");

class User {

    /* Methods
    */
    function __construct(){
    }

    static function find_all_users(){
        global $database;

        $result_set = $database->query("SELECT * FROM users");
        return $result_set;
    }




}



?>