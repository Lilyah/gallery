<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (usually variables)
    /* PUBLIC : this property can be used through the whole program
    /* STATIC : this property don't need an instance. We can refer to it by it's class
    */
    static $wheel_count = 4;

    // Here are the methods (functions)
    static function car_detail(){
        /* IMPORTANT : In statich methods we have to use only static properties
        */
        return self::$wheel_count; // this is how we acces properties in static method
    }

}


class Trucks extends Cars {

    // This method call method car_details() from class Cars
    static function display() {
        echo parent::car_detail(); // "parent" is equal do "Cars", it doesn't matter which one will be used
    }

}



/* Calling method display() from class Truckc
/* Method display() calls STATIC method (car_details)
*/
Trucks::display();



?>