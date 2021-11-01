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
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(mysqli_connect_errno()){
            die("Database connection failed badly" . mysqli_error($this->connection));
        }
    }

    // Quqery builder
    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    // Confirm queri
    private function confirm_query($result){
        if(!$result){
            die("Query Failed");
        }
    }

    // Escape strings when input data
    public function escape_string($string){
        $escape_string = mysqli_real_escape_string($this->connection, $string);
        return $escape_string;
    }

}

$database = new Database;


?>