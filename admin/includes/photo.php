<?php

require_once("config.php");

class Photo extends Db_object {

    /* Properties
    */
    protected static $db_table = "photos"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('photo_title', 'photo_description', 'photo_filename', 'photo_type', 'photo_size');
    public $photo_id;
    public $photo_title;
    public $photo_description;
    public $photo_filename;
    public $photo_type;
    public $photo_size;

    public $tmp_path;
    public $upload_directory = "images";
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

    // This is passing $_FILES['upload_file'] as an argument
    public function set_file($file){
        // Error checking
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0){ // Error 0 is UPLOAD_ERR_OK => 'There is no error'
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else { // If there are no errors the data will be submited
            $this->filename     = basename($file['name']); // asign the key 'name' go the object property "filename"
            $this->tmp_path     = $file['tmp_name'];
            $this->photo_type   = $file['photo_type'];
            $this->photo_size   = $file['photo_size'];
        }

    }
}


?>