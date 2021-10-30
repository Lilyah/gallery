<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (usually variables)
    var $wheel_count = 4; //default value
    var $door_count = 4; //default value

    // Here are the methods (functions)
    function car_detail(){
        return "This Car has " . $this->wheel_count . " wheels."; //psudo variable $this refers to this specific class (Cars)
    }

}

/* Instanciating
*/
$bmw = new Cars();
$toyota = new Cars();

/* Activating wheel_count property from Cars class, with his default value
*/
echo $bmw->wheel_count;

echo "<br>";
echo $bmw->wheel_count = 10; // changing the value

echo "<br>";
echo $toyota->wheel_count;

echo "<br>";
echo $toyota->car_detail(); // calling method that uses $this

?>