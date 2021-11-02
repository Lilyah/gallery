<?php

require_once("config.php");

class User {

    /* Methods
    */
    function __construct(){
    }

    // Finding all users
    static function find_all_users(){
        return User::find_this_query("SELECT * FROM users");
    }

    // Finding user by id
    static function find_users_by_id($user_id){
        $result_set = User::find_this_query("SELECT * FROM users WHERE user_id = $user_id");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    // Method for executing any query
    public static function find_this_query($sql){
        global $database;

        $result_set = $database->query($sql);
        return $result_set;
    }



}



?>