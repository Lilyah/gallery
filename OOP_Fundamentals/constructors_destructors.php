<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (usually variables)
    /* PUBLIC : this property can be used through the whole program
    /* STATIC : this property don't need an instance. We can refer to it by it's class
    */
    public $wheel_count = 4;
    static $door_count = 4;

    // Here are the methods (functions)
    /* Construct is called automaticaly when instantiating a class
    */
    function __construct(){
        echo $this->wheel_count . "<br>";
        echo self::$door_count; //we can put here static properties without setting "static function __contruct()"
    }

}


/* Instantiating
*/
$bmw = new Cars;  // Construct is called automaticaly when instantiating a class; we don't need to call it with  "$bmw->__construct()"; 




?>