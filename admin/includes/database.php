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

    // Connect to the DB
    public function open_db_connection(){
        // Creating new mysqli object
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($this->connection->connect_errno){
            // connect_error and connect_errno are build-in
            die("Database connection failed badly" . $this->connection->connect_error);
        }
    }

    // Quqery builder
    public function query($sql){
        $result = $this->connection->query($sql);
        // Using custom method confirm_query
        $this->confirm_query($result);
        return $result;
    }

    // Confirm query
    private function confirm_query($result){
        if(!$result){
            die("Query Failed" . $this->connection->error);
        }
    }

    // Escape strings when input data
    public function escape_string($string){
        $escape_string = $this->connection->real_escape_string($string);
        return $escape_string;
    }

    //
    public function the_insert_id(){
        return $this->connection->insert_id;
    }

}



$database = new Database;


?>