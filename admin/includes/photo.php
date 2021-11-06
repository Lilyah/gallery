<?php

require_once("config.php");

class Photo extends Db_object {

    /* Properties
    */
    protected static $db_table = "photo"; // Makes the method below more flexible, because we can use them with different tables
    protected static $db_table_fields = array('photo_id', 'photo_title', 'photo_description', 'photo_filename', 'photo_type', 'photo_size');
    public $photo_id;
    public $photo_description;
    public $photo_filename;
    public $photo_type;
    public $photo_size;


    /* Methods
    */
}


?>