<?php

require_once("config.php");

class Db_object {

    /* Properties
    */
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

    // Finding all records
    /* Db_object::find_all()  ... Here is the flow once is called 
        1. It goes to the find_all method 
        2. The find_all() returns the find_by_query() results 
        3. The find_by_query()  does a couple things 
            A. it makes the query 
            B. Fetches the the data from database table using  a while loop and it returns it in $row
            C. Passes the results ($row) to the Instantiation (instantantion - weird name I know) method
            D. Returns the object in the $the_object_array variable that it gets from the  instantantion method.
            E. And that will be the result that find_all() returns when we use Db_object::find_all()
    */
    public static function find_all(){
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
    }

    // Finding record by id
    public static function find_by_id($id){
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id");

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
    }


    // Method for executing any query
    public static function find_by_query($sql){
        global $database;
        $result_set = $database->query($sql);

        // Empty array to put objects in it
        $the_object_array = array();

        // Loop that fetches the database table and brings back the results
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = static::instantiation($row);
        }
        return $the_object_array;
    }

    //
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);

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
        $calling_class = get_called_class(); // Build-in function for detecting the calling class
        $the_object = new $calling_class; // Instantiate the calling class

        /* The foreach code below is actually doing something this here
        */
        // $user->id = $found_user['id'];
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


    // Pulling out the properties of the class where the method is called
    protected function properties(){
        $properties = array();
        foreach(static::$db_table_fields as $db_field){
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


    // Check if the record exists. If the record exists it will update it, if doesn't exist will create it
    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }


    // Create record method
    public function create(){
        global $database;

        $properties = $this->clean_properties(); // Will return all the properties of this class

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")"; // implode() join array elements with a string
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

        if($database->query($sql)){
            $this->id = $database->the_insert_id(); // Pulling the id of the last record and asigned in $this->id
            return true;
        } else {
            return false;
        }
    }


    // Update record method
    public function update(){
        global $database;

        // The code below actualy is doing something like this
        // $sql = "UPDATE " . User::$db_table . " SET ";
        // $sql .= "username= '" . $database->escape_string($this->username) ."', ";
        // $sql .= "user_password= '" . $database->escape_string($this->user_password) ."', ";
        // $sql .= "user_first_name= '" . $database->escape_string($this->user_first_name) ."', ";
        // $sql .= "user_last_name= '" . $database->escape_string($this->user_last_name) ."' ";
        // $sql .= " WHERE id= " . $database->escape_string($this->id);

        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach($properties as $key => $value){
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    // Delete record method
    public function delete(){
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE ";
        $sql .= "id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

}

?>