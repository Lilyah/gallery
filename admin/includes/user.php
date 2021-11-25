<?php

require_once("config.php");

class User extends Db_object {

    /* Properties
    */
    protected static $db_table = "users"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('username', 'user_photo', 'user_password', 'user_first_name', 'user_last_name');
    public $id;
    public $username;
    public $user_photo;
    public $user_password;
    public $user_first_name;
    public $user_last_name;

    public $tmp_path;
    public $upload_directory = "images";
    public $user_photo_placeholder = "http://placehold.it/400x400&text=image";

    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => 'There is no error', // Value: 0;
        UPLOAD_ERR_INI_SIZE => 'The upload file exceeds the upload_max_filesize directive in php.ini.', // Value: 1;
        UPLOAD_ERR_FORM_SIZE => ' The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.', // Value: 2;
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.', // Value: 3;
        UPLOAD_ERR_NO_FILE => 'No file was uploaded.', // Value: 4;
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.', // Value: 6;
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.', // Value: 7;
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.' // Value: 8;
    );
    

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


    // Saving the user photo in the db and the upload dir
    public function save_user_photo(){  
        // If there are errors will return false
        if(!empty($this->errors)){ 
            return false;
        }
        //If the file is empty or the temp path is empty
        // if(empty($this->user_photo) || empty($this->tmp_path)){
        //     $this->errors[] = "The file was not available";
        //     return false;
        // }

        //user_photo comes from set_file() method $this->user_photo = basename($file['name']); 
        //$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_photo;
        $target_path = SITE_ROOT.DS.'admin'.DS.$this->photo_path_placeholder();

        // If the user_photo already exists
        // if(file_exists($target_path)){
        //     $this->errors[] = "The file {$this->user_photo} already exists";
        //     return false;
        // }
        
        // Moving the file from tmp to permanent location
        // move_uploaded_file is build-in function which moves an uploaded file to a new location ($target_path).Return true or false
        if(move_uploaded_file($this->tmp_path, $target_path)){
                unset($this->tmp_path);
                return true;
        } else { 
            // If for some reason the file was not uploaded 
            $this->errors[] = "Check for proper permissions on file directory";
            return false;
        }
        
    }


    // Method for php processing/updating information for modal
    public function ajax_save_user_image($user_photo, $user_id){
        $this->user_photo = $user_photo;
        $this->id = $user_id;
        $this->save();
    }


}



?>