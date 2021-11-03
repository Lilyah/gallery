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
    /* User::find_all()  ... Here is the flow once is called 
        1.   It goes to the find_all method 
        2. The find_all() returns the find_by_query() results 
        3. The find_by_query()  does a couple things 
            A. it makes the query 
            B. Fetches the the data from database table using  a while loop and it returns it in $row
            C. Passes the results ($row) to the Instantiation (instantantion - weird name I know) method
            D. Returns the object in the $the_object_array variable that it gets from the  instantantion method.
            E. And that will be the result that find_all() returns when we use User::find_all()
    */
    public static function find_all_users(){
        return User::find_this_query("SELECT * FROM users");
    }

    // Finding user by id
    public static function find_users_by_id($user_id){
        global $database;
        $the_result_array = User::find_this_query("SELECT * FROM users WHERE user_id = $user_id");

        /* ONE way of doing this  
        */
        // if(!empty($the_result_array)){
        //     $first_item = array_shift($the_result_array);
        //     return $first_item;
        // } else {
        //     return false;
        // }

        /* SECOND way of doing this is Ternary Behaviour
        */
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

        //return $found_user;
    }

    // Method for executing any query
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);

        // Empty array to put objects in it
        $the_object_array = array();

        // Loop that fetches the database table and brings back the results
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = User::instantiation($row);
        }
        return $the_object_array;
    }

    // Method for automathic instatiation of class User and his properties
    /* What the Instantation method is doing
        1. Gets the calling class name.
        2. Creates an instance of the class
        3. It loops through the $the_record variable that has all the records
        4. It checks to see if the properties exist on that object with the other method has_the_property() 
        5. If the keys from the record which basically are the columns from db table are found or equal the object properties then it assigns the values to them.
        6. Finally it returns the object!
    */
    public static function instantiation($the_record){
        $the_object = new User; 

        /* The foreach code below is actually doing this here
        */
        // $user->user_id = $found_user['user_id'];
        // $user->username = $found_user['username'];
        // $user->user_password = $found_user['user_password'];
        // $user->user_first_name = $found_user['user_first_name'];
        // $user->user_last_name = $found_user['user_last_name'];

        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){}
                $the_object->$the_attribute = $value;
        }

        return $the_object;
    }

    // 
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);

    }



}



?>