<?php

require_once("config.php");

class User {

    /* Properties
    */
    public $user_id;
    public $username;
    public $user_password;
    public $user_first_name;
    public $user_last_name;


    /* Methods
    */
    function __construct(){
    }

    // Finding all users
    public static function find_all_users(){
        return User::find_this_query("SELECT * FROM users");
    }

    // Finding user by id
    public static function find_users_by_id($user_id){
        $result_set = User::find_this_query("SELECT * FROM users WHERE user_id = $user_id");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    // Method for executing any query
    public static function find_this_query($sql){
        global $database;

        // Empty array to put objects in it
        $the_object_array = array();
        $result_set = $database->query($sql);

        // Loop that fetches the database table and brings back the results
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = User::instantiation($row);
        }
        return $the_object_array;
    }

    // Method for automathic instatiation of class User and hiw properties
    public static function instantiation($found_user){
        $user = new User;

        /* The foreach code below is actually doing this here
        */
        // $user->user_id = $found_user['user_id'];
        // $user->username = $found_user['username'];
        // $user->user_password = $found_user['user_password'];
        // $user->user_first_name = $found_user['user_first_name'];
        // $user->user_last_name = $found_user['user_last_name'];

        foreach($found_user as $the_attribute => $value){
            if($user->has_the_attribute($the_attribute)){}
                $user->$the_attribute = $value;
        }

        return $user;
    }

    // 
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);

    }



}



?>