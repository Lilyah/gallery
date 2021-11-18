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

}



?>