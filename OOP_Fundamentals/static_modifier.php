<?php

/* Defining a class
*/

use Cars as GlobalCars;

class Cars {
    // Here are the properties (usually variables)
    /* PUBLIC : this property can be used through the whole program
    /* STATIC : this property don't need an instance. We can refer to it by it's class
    */
    public $wheel_count = 4;
    static $door_count = 4;


    // Here are the methods (functions)
    function car_detail(){
        echo $this->wheel_count; 
    }

    static function car_detail_2(){
        /* IMPORTANT : In statich methods we have to use only static properties
        */
        echo Cars::$door_count; // this is how we acces properties in static method
    }

}

/* Instanciating
*/
$bmw = new Cars(); 

echo $bmw->wheel_count;

echo "<br>";
//echo $bmw->door_count; // This will through an error "Accessing static property Cars::$door_count as non static"

/* The proper way to call static property
*/
echo Cars::$door_count;

echo "<br>";

/* The proper way to call static method
*/
echo Cars::car_detail_2();


?>