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
    
    // Method for 
    
    
}



?>