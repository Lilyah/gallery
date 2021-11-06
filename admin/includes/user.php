<?php

require_once("config.php");

class User extends Db_object {

    /* Properties
    */
    protected static $db_table = "users"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('username', 'user_password', 'user_first_name', 'user_last_name');
    public $user_id;
    public $username;
    public $user_password;
    public $user_first_name;
    public $user_last_name;


    /* Methods
    */
    function __construct(){
    }

    
    // Method for verifying user
    public static function verify_user($username, $user_password){
        global $database;

        // Using the method escape_string from class Database for cleaning the input info
        $username = $database->escape_string($username);
        $user_password = $database->escape_string($user_password);

        $sql = "SELECT * FROM " . User::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND user_password = '{$user_password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = User::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    // Pulling out the properties of the class where the method is called
    protected function properties(){
        $properties = array();
        foreach(User::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties; // returning array with keys and values
    }


    // Using $database->escape_string() for array values
    protected function clean_properties(){
       global $database;
       
       $clean_properties = array();
       // Loop throw %this->properties() and pull out the keys and the values
       foreach($this->properties() as $key => $value){
           $clean_properties[$key] = $database->escape_string($value); // cleaning the pulled out values with $database->escape_string($value) and asigned them to $clean_properties[$key]
       }

       return $clean_properties; // return array
    }


    // Check if the user exists. If the user exists it will update it, if doesn't exist will create it
    public function save(){
        return isset($this->user_id) ? $this->update() : $this->create();
    }


    // Create user method
    public function create(){
        global $database;

        $properties = $this->clean_properties(); // Will return all the properties of this class

        $sql = "INSERT INTO " . User::$db_table . "(" . implode(",", array_keys($properties)) . ")"; // implode() join array elements with a string
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

        if($database->query($sql)){
            $this->user_id = $database->the_insert_id(); // Pulling the user_id of the last record and asigned in $this->user_id
            return true;
        } else {
            return false;
        }
    }


    // Update user method
    public function update(){
        global $database;

        // The code below actualy is doing something like this
        // $sql = "UPDATE " . User::$db_table . " SET ";
        // $sql .= "username= '" . $database->escape_string($this->username) ."', ";
        // $sql .= "user_password= '" . $database->escape_string($this->user_password) ."', ";
        // $sql .= "user_first_name= '" . $database->escape_string($this->user_first_name) ."', ";
        // $sql .= "user_last_name= '" . $database->escape_string($this->user_last_name) ."' ";
        // $sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach($properties as $key => $value){
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . User::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE user_id= " . $database->escape_string($this->user_id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    // Delete user method
    public function delete(){
        global $database;

        $sql = "DELETE FROM " . User::$db_table . " WHERE ";
        $sql .= "user_id= " . $database->escape_string($this->user_id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }



}



?>