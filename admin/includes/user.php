<?php

require_once("config.php");

class User {

    /* Methods
    */
    function __construct(){
    }

    // Finding all users
    static function find_all_users(){
        global $database;

        $result_set = $database->query("SELECT * FROM users");
        return $result_set;
    }

    // Finding user by id
    static function find_users_by_id($user_id){
        global $database;

        $result_set = $database->query("SELECT * FROM users WHERE user_id = $user_id");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }




}



?>