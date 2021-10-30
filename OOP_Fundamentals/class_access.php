<?php

/* Defining a class
*/

use Cars as GlobalCars;

class Cars {
    // Here are the properties (usually variables)
    /* PUBLIC : this property can be used through the whole program
    /* PRIVATE : this property can be used only in this class
    /* PROTECTED : this property can be used inside this class and inside subclasses
    */
    public $wheel_count = 4;
    private $door_count = 4;
    protected $seat_count = 4;

    // Here are the methods (functions)
    function car_detail(){
        echo $this->wheel_count;
        echo $this->door_count;
        echo $this->seat_count;
    }

}

/* Instanciating
*/
$bmw = new Cars(); 

echo $bmw->wheel_count;
echo "<br>";
echo $bmw->door_count; // this will give an error "Cannot access private property Cars::$door_count"
echo "<br>";
echo $bmw->seat_count; // this will give an error "Cannot access protected property Cars::$seat_count"
echo "<br>";

/* We can access PRIVATE and PROTECTED properties trought method in the class
*/
$bmw->car_detail();

?>