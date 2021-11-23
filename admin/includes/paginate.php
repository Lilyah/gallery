<?php

require_once("config.php");

class Paginate extends Db_object {

    /* Properties
    */
    public $current_page;
    public $items_per_page;
    public $items_total_count;


    /* Methods
    */
    public function __construct($page=1, $items_per_page=4, $items_total_count=0){
        // Giving default values to the properties of the class
        $this->current_page = (int)$page;
        $this->items_per_page = (int)$items_per_page;
        $this->items_total_count = (int)$items_total_count;
    }


    // Method for going to the next page
    public function next(){
        return $this->current_page + 1; 
    }


    // Method for going to the previous page
    public function previous(){
        return $this->current_page - 1; 
    }


    // Method for finding how many pages total we have
    public function page_total(){
        // ceil(): Returns the next highest integer value by rounding up num if necessary
        return ceil($this->items_total_count/$this->items_per_page);
    }

}



?>