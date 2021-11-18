<?php

require_once("config.php");

class Comment extends Db_object {

    /* Properties
    */
    protected static $db_table = "comments"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('photo_id', 'author', 'body');
    public $id;
    public $photo_id;
    public $author;
    public $body;
    

    /* Methods
    */
    
    // Method for self instantiation of this method
    public static function create_comment($photo_id, $author="John Doe", $body="") {
        if(!empty($photo_id) && !empty($author) && !empty($body)){
            $comment = new Comment(); // Instantiation

            // Assigning values to the properties
            $comment->photo_id  = (int)$photo_id;
            $comment->author    = $author;
            $comment->body      = $body;

            return $comment;
        } else {
            return false;
        }
    }


    // Finding comments related to specific photo_id
    public static function find_the_comments($photo_id=0) {
        global $database;

        // Using the method escape_string from class Db_object for cleaning the input info
        $photo_id = $database->escape_string($photo_id);

        $sql = "SELECT * FROM " . self::$db_table;
        $sql.= " WHERE photo_id = " . $photo_id;
        $sql.= " ORDER BY photo_id ASC";

        return self::find_by_query($sql);
    }

}



?>