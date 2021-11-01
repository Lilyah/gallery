<?php

require_once("config.php");


class Database {

    /* Properties 
    */
    public $connection;

    /* Methods
    */
    function __construct(){
        $this->open_db_connection();
    }

    public function open_db_connection(){
        // Connect to the DB
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(mysqli_connect_errno()){
            die("Database connection failed badly" . mysqli_error($this->connection));
        }


    }
}

$database = new Database;


?>