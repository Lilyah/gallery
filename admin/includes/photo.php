<?php

require_once("config.php");

class Photo extends Db_object {

    /* Properties
    */
    protected static $db_table = "photos"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('photo_title', 'photo_caption', 'photo_description', 'photo_filename', 'photo_alternate_text','photo_type', 'photo_size');
    public $id;
    public $photo_title;
    public $photo_caption;
    public $photo_description;
    public $photo_filename;
    public $photo_alternate_text;
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
            $this->photo_filename     = basename($file['name']); // asign the key 'name' go the object property "filename"
            $this->tmp_path     = $file['tmp_name'];
            $this->photo_type   = $file['type'];
            $this->photo_size   = $file['size'];
        }

    }


    // Getting upload directory along with the image
    function picture_path(){
        return $this->upload_directory.DS.$this->photo_filename;
    }



    //
    public function save(){
        // Error checking
        if($this->id){
            $this->update();
        } else {
            // If there are errors will return false
            if(!empty($this->errors)){ 
                return false;
            }

            // If the file is empty or the temp path is empty
            if(empty($this->photo_filename) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available";
                return false;
            }

            //photo_filename comes from set_file() method $this->photo_filename = basename($file['name']); 
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->photo_filename;

            // If the filename already exists
            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->photo_filename} already exists";
                return false;
            }

            // Moving the file from tmp to permanent location
            // move_uploaded_file is build-in function which moves an uploaded file to a new location ($target_path). Return true or false
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            } else { 
                // If for some reason the file was not uploaded 
                $this->errors[] = "Check for proper permissions on file directory";
                return false;
            }
        }
    }


    // Delete the photo file from the db and from the server/upload folder
    public function delete_photo(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS.'admin'.DS.$this->picture_path();

            // Deleting the image from the server/upload folder
            return unlink($target_path) ? true : false; 
        } else {
            return false;
        }
    }


    // Displaying sidebar data in modal in admin/edit_user
    public static function display_sidebar_data($photo_id){ // We are getting the $photo_id 
        $photo = Photo::find_by_id($photo_id); // We finding that record and assigning it to $photo

        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}'></a> ";
        $output.="<p>{$photo->photo_filename}</p>"; // Displaying the properties
        $output.="<p>{$photo->photo_type}</p>";
        $output.="<p>{$photo->photo_size}</p>";

        echo $output;
    }

}


?>