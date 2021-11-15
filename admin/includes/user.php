<?php

require_once("config.php");

class User extends Db_object {

    /* Properties
    */
    protected static $db_table = "users"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('username', 'user_photo', 'user_password', 'user_first_name', 'user_last_name');
    public $user_id;
    public $username;
    public $user_photo;
    public $user_password;
    public $user_first_name;
    public $user_last_name;

    public $tmp_path;
    public $upload_directory = "images";
    public $user_photo_placeholder = "http://placehold.it/400x400&text=image";

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


    // User photo path
    public function photo_path_placeholder() {
        return empty($this->user_photo) ? $this->user_photo_placeholder : $this->upload_directory.DS.$this->user_photo;
    }


    // Delete the photo file from the db and from the server/upload folder
    public function delete_user(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS.'admin'.DS.$this->photo_path_placeholder();

            // Deleting the image from the server/upload folder
            return unlink($target_path) ? true : false; 
        } else {
            return false;
        }
    }


}



?>